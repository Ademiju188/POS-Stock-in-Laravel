<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class StockController extends Controller
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
            'description' => 'nullable',
            'category_id' => 'required',
            'expiredate' => 'nullable',
            'stock_alert' => 'required',
            'stock_img' => 'image|nullable|max:2042',
        ]);

        if($request->hasFile('stock_img')){
            //Get file name
            $fileNameWithExt = $request->file('stock_img')->getClientOriginalName();
            //File name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('stock_img')->getClientOriginalExtension();

            $fileNameToStore = $filename. '_' .time(). '.' .$extension;

            $path = $request->file('stock_img')->storeAs('public/stock', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'stock.png';
        }


        $result = DB::table('stocks')->where('name', $request->input('name'))->get();
        $res = json_decode($result, true);
        print_r($res);



        if (sizeof($res) == 0) {
        $data = $request->input();
        $stock = new Stock;
        $stock->name = ucwords($data['name']);
        $stock->description = $data['description'];
        $stock->supplierprice = $data['supplierprice'];
        $stock->stock_alert = $data['stock_alert'];
        $stock->category_id = $data['category_id'];
        $stock->expiredate = $data['expiredate'];
        $stock->stock_img = $fileNameToStore;
        $stock->lastUpdatedTime = date('h:i:s') .' '. date('A');
        $stock->lastUpdatedDate = date('D-M-Y');
        $stock ->save();
        }
        else{
            return redirect()->back()->with('error', 'Product already exist!');
        }
        return redirect()->back()->with('success', 'Product Added to Stock Successfully');
        return redirect()->back()->with('error', 'Product Registration Failed!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('stock_img')){
            //Get file name
            $fileNameWithExt = $request->file('stock_img')->getClientOriginalName();
            //File name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('stock_img')->getClientOriginalExtension();

            $fileNameToStore = $filename. '_' .time(). '.' .$extension;

            $path = $request->file('stock_img')->storeAs('public/stock', $fileNameToStore);
        }

        $data = $request->input();
        $stock = Stock::find($id);
        $stock->name = ucwords($data['name']);
        $stock->description = $data['description'];
        $stock->supplierprice = $data['supplierprice'];
        if($data['stock_alert'] < 0){
            return redirect()->back()->with('error', 'Item has been exhausted, Please restock!');
        }
        else{

            $stock->stock_alert = $data['stock_alert'];
        }
        $stock->category_id = $data['category_id'];
        $stock->expiredate = $data['expiredate'];
        $stock->comments = $data['comments'];
        if($request->hasFile('stock_img')){
            $stock->stock_img  = $fileNameToStore;
        }
        $stock->lastUpdatedTime = date('h:i:s') .' '. date('A');
        $stock->lastUpdatedDate = date('D-M-Y');

        $stock ->save();

        return redirect()->back()->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(stock $stock)
    {
        if($stock->stock_img != 'stock.png'){
            Storage::delete('public/stock/'.$stock->stock_img );
        }
        $stock->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }
}
