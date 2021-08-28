<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{

 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');


        $this->middleware(function($request,$next){
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('toast_success')) {
                Alert::toast(session('toast_success'));
            }
            if (session('error')) {
                Alert::error(session('error'));
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
        // $product = Product::find($request);
        // if($product->quantity  == 0 || $product->quantity < 0)
        // {
        //     return redirect()->back()->with('error', 'Product quantity cannot be less than Zero!');
        // }

        $result = DB::table('carts')
        ->where('name', $request->input('name'))
        ->get();

    $res = json_decode($result, true);
    print_r($res);

    if (sizeof($res) == 0) {
        $data = $request->input();
        $cart = new Cart;
        $cart->name = $data['name'];
        if($data['qty'] == 0 || $data['qty'] < 0)
        {

            return redirect()->back()->with('error', 'Product quantity has been exhausted, Please restock!');
        }
        if($data['quantity'] == 0 || $data['quantity'] < 0)
        {
            return redirect()->back()->with('error', 'Quantity cannot be less than Zero!');
        }else{
            $cart->quantity = $data['quantity'];
        }
        $cart->price = $data['quantity'] * $data['price'];
        $cart->product_id = $data['product_id'];
        $cart->user_id = auth()->user()->id;

        $cart->save();

        return redirect()->back()->with('success', 'Product Added');
    }
    else{
        return redirect()->back()->with('error', 'Product Already Exits!');
    }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
