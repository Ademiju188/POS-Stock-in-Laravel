<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;






class OrderDetailsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next)
        {
            if ($request->session()->has('success')) {
                alert()->success($request->session()->get('success'));
            }

            if ($request->session()->has('info')) {
                alert()->info($request->session()->get('info'));
            }

            if ($request->session()->has('warning')) {
                alert()->warning($request->session()->get('warning'));
            }

            if ($request->session()->has('question')) {
                alert()->question($request->session()->get('question'));
            }

            if ($request->session()->has('info')) {
                alert()->info($request->session()->get('info'));
            }

            if ($request->session()->has('error')) {
                alert()->error($request->session()->get('error'));
            }

            // if ($request->session()->has('errors') && config('sweetalert.middleware.auto_display_error_messages')) {
            //     $error = $request->session()->get('errors');

            //     if (!is_string($error)) {
            //         $error = $this->getErrors($error->getMessages());
            //     }

            //     alert()->error($error);
            // }

            if ($request->session()->has('toast_success')) {
                alert()->toast($request->session()->get('toast_success'), 'success')->middleware();
            }

            if ($request->session()->has('toast_info')) {
                toast($request->session()->get('toast_info'), 'info')->middleware();
            }

            if ($request->session()->has('toast_warning')) {
                toast($request->session()->get('toast_warning'), 'warning')->middleware();
            }

            if ($request->session()->has('toast_question')) {
                toast($request->session()->get('toast_question'), 'question')->middleware();
            }

            if ($request->session()->has('toast_error')) {
                toast($request->session()->get('toast_error'), 'error')->middleware();
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
        $data = $request->input();
        $order = new Order;
        $order->payment = $data['payment'];
        if($data['balance'] < 0)
        {
            return redirect()->back()->with('error', 'Invalid Balance!');
        }
        else{
            $order->balance = $data['balance'];
        }
        $order->save();
        $order_id = $order->id;
        for($product_id = 0; $product_id < count($request->product_id); $product_id++){
            $order_details = new OrderDetails;
            $order_details->product_name = $request->product_name[$product_id];
            $order_details->product_id  = $request->product_id[$product_id];
            $order_details->order_id  = $order_id;
            $order_details->product_price  = $request->product_price[$product_id];
            $order_details->unitprice  = $request->unitprice[$product_id];
            $order_details->qty  = $request->qty[$product_id];
            $order_details->payment_method  = $data['paymentMethod'];
            $order_details->date = date('Y-m-d');
            $order_details->mydate = date('D-M-Y');
            $order_details->save();
        }
        Cart::where('user_id', auth()->user()->id)->delete();
        return redirect()->back()->with('toast_success', 'Order was Successful, Please print and deliver the Products.');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetails $orderDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetails $orderDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderDetails $orderDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetails  $orderDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetails $orderDetails)
    {
        //
    }
}
