<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
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
            'product_name' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'product_img' => 'image|nullable|max:2042',
        ]);

        if($request->hasFile('product_img')){
            //Get file name
            $fileNameWithExt = $request->file('product_img')->getClientOriginalName();
            //File name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('product_img')->getClientOriginalExtension();

            $fileNameToStore = $filename. '_' .time(). '.' .$extension;

            $path = $request->file('product_img')->storeAs('public/product', $fileNameToStore);
        }
        else{
            $fileNameToStore = 'product.png';
        }

        $result = DB::table('products')->where('product_name', $request->input('product_name'))->get();
        $res = json_decode($result, true);
        print_r($res);



        if (sizeof($res) == 0)
        {
            $product = new Product();
            $data = $request->input();
            $product->product_name = ucwords($data['product_name']);
            $product->category_id = $data['category_id'];
            if($data['price'] == 0 || $data['price'] < 0)
            {
                return redirect()->back()->with('error', 'Product Price cannot be Zero!');
            }
            else
            {
                $product->price = $data['price'];
            }
            if($data['quantity'] == 0 || $data['quantity'] < 0){
                return redirect()->back()->with('error', 'Product Quantity cannot be Zero!');
            }
            else{
                $product->quantity = $data['quantity'];
            }
            $product->description = $data['description'];
            $product->product_img = $fileNameToStore;
            $product->lastUpdatedTime = date('h:i:s') .' '. date('A');
            $product->lastUpdatedDate = date('D-M-Y');

            $product->save();
        }
        else
        {
            return redirect()->back()->with('error', 'Product already exist!');
        }
        return redirect()->back()->with('success', 'Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('product_img')){
            //Get file name
            $fileNameWithExt = $request->file('product_img')->getClientOriginalName();
            //File name
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('product_img')->getClientOriginalExtension();

            $fileNameToStore = $filename. '_' .time(). '.' .$extension;

            $path = $request->file('product_img')->storeAs('public/product', $fileNameToStore);
        }

        $data = $request->input();
        $product = Product::find($id);
        $product->product_name = ucwords($data['product_name']);
        $product->description = $data['description'];
        if($data['price'] == 0 || $data['price'] < 0)
        {
            return redirect()->back()->with('error', 'Product Price cannot be Zero!');
        }
        else
        {
            $product->price = $data['price'];
        }
        if($data['quantity'] == 0 || $data['quantity'] < 0){
            return redirect()->back()->with('error', 'Product Quantity has been exhausted, Please restock!');
        }
        else{
            $product->quantity = $data['quantity'];
        }
        $product->category_id = $data['category_id'];
        if($request->hasFile('product_img')){
            $product->product_img  = $fileNameToStore;
        }
        $product->lastUpdatedTime = date('h:i:s') .' '. date('A');
        $product->lastUpdatedDate = date('D-M-Y');
        $product ->save();

        return redirect()->back()->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->product_img != 'product.png'){
            Storage::delete('public/product/'.$product->product_img );
        }
        $product->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }
}
