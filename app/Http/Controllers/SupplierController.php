<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            if (session('errorForm')) {
                $html = "<ul style='list-style: none;'>";
                foreach (session('errorForm') as $error) {
                    $html .= "<li>$error[0]</li>";
                }
                $html .= "</ul>";

                Alert::html('Error during the creation!', $html, 'error');
            }



            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => ['required', 'string', 'min:11', 'max:11'],
            'address' => 'required',
            'status' => 'required',
            'supplier_img' => 'image|nullable|max:2042',
        ]);


        if($request->hasFile('supplier_img')){
            //Get file name
            $fileNameWithExt = $request->file('supplier_img')->getClientOriginalName();
            //File name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('supplier_img')->getClientOriginalExtension();

            $fileNameToStore = $filename. '_' .time(). '.' .$extension;

            $path = $request->file('supplier_img')->storeAs('public/supplier', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'supplier.png';
        }


        $result = DB::table('suppliers')->where('supplier_name', $request->input('name'))->get();
        $result = DB::table('suppliers')->where('email', $request->input('email'))->get();

        $res = json_decode($result, true);
        print_r($res);

        if (sizeof($res) == 0) {
        $data = $request->input();
        $supplier = new Supplier;

        $supplier->supplier_name = ucwords($data['name']);
        $supplier->email = strtolower($data['email']);
        $supplier->mobile =$request->mobile;
        $supplier->address = ucwords($data['address']);
        $supplier->status =$request->status;

        $supplier->supplier_img = $fileNameToStore;


        $supplier ->save();
        return redirect(url('admin/supplier/index'))->with('success', 'Supplier Created Successfully');
        }

        return redirect()->back()->with('error', 'Supplier Name or Email Already Exists!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => ['required', 'string', 'min:11', 'max:11'],
            'address' => 'required',
            'status' => 'required',
            'supplier_img' => 'image|nullable|max:2042',
        ]);


        if($request->hasFile('supplier_img')){
            //Get file name
            $fileNameWithExt = $request->file('supplier_img')->getClientOriginalName();
            //File name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('supplier_img')->getClientOriginalExtension();

            $fileNameToStore = $filename. '_' .time(). '.' .$extension;

            $path = $request->file('supplier_img')->storeAs('public/supplier', $fileNameToStore);
        }

        $data = $request->input();
        $supplier = Supplier::find($id);
        $supplier->supplier_name = ucwords($data['name']);
        $supplier->email = strtolower($data['email']);
        $supplier->mobile =$request->mobile;
        $supplier->address = ucwords($data['address']);
        $supplier->status =$request->status;

        if($request->hasFile('supplier_img')){
            $supplier->supplier_img  = $fileNameToStore;
        }

        $supplier ->save();
        return redirect()->back()->with('success', 'Supplier Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if(!$supplier){
            return back()->with('error', 'Supplier Not Found');
        }
        if($supplier->supplier_img != 'supplier.png'){
            Storage::delete('public/supplier/'.$supplier->supplier_img );
        }
        $supplier->delete();
        return back()->with('success', 'Supplier Deleted Successfully');
    }
}
