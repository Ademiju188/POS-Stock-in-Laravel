<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;


use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $greetings = "";

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");

        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "11") {
            $greetings = "Good Morning";
        } else

        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "11" && $time < "17") {
            $greetings = "Good Afternoon";
        } else

        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            $greetings = "Good Evening";
        } else

        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            $greetings = "Good Night";
        }

        $item = Product::all();
        $stock = Stock::all();
        $numSupplier = Supplier::count();
        $numStock = Stock::count();
        $numUser = User::count();
        $numProduct = Product::count();
        $numOrder = OrderDetails::whereDate('created_at', '=', date('Y-m-d'))->count();

        return view('admin.dashboard', ['items' => $item, 'stock' => $stock], compact('greetings', 'numSupplier',  'numStock', 'numUser', 'numProduct', 'numOrder'))->with('toast_success', 'You are Logged In');
    }

    public function storekeeper()
    {
        $greetings = "";

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");

        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "11") {
            $greetings = "Good Morning";
        } else

        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "11" && $time < "17") {
            $greetings = "Good Afternoon";
        } else

        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            $greetings = "Good Evening";
        } else

        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            $greetings = "Good Night";
        }

        $item = Stock::all();
        $numSupplier = Supplier::count();
        $numStock = Stock::count();
        $numUser = User::count();
        $numProduct = Product::count();
        $numOrder = OrderDetails::count();

        return view('storekeeper.dashboard', ['items' => $item], compact('greetings', 'numSupplier',  'numStock', 'numUser', 'numProduct', 'numOrder'))->with('toast_success', 'You are Logged In');
    }

    public function manager()
    {
        $greetings = "";

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");

        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "11") {
            $greetings = "Good Morning";
        } else

        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "11" && $time < "17") {
            $greetings = "Good Afternoon";
        } else

        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            $greetings = "Good Evening";
        } else

        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            $greetings = "Good Night";
        }

        $item = Stock::all();
        $numSupplier = Supplier::count();
        $numStock = Stock::count();
        $numUser = User::count();
        $numProduct = Product::count();
        $numOrder = OrderDetails::count();

        return view('manager.dashboard', ['items' => $item], compact('greetings','numSupplier',  'numStock', 'numUser', 'numProduct', 'numOrder'))->with('toast_success', 'You are Logged In');
    }

    public function staff()
    {
        $greetings = "";

        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");

        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "11") {
            $greetings = "Good Morning";
        } else

        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "11" && $time < "17") {
            $greetings = "Good Afternoon";
        } else

        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            $greetings = "Good Evening";
        } else

        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            $greetings = "Good Night";
        }
        $item = Product::all();
        $numSupplier = Supplier::count();
        $numStock = Stock::count();
        $numUser = User::count();
        $numProduct = Product::count();
        $numOrder = OrderDetails::whereDate('created_at', '=', date('Y-m-d'))->count();

        return view('staff.dashboard', ['items' => $item], compact('greetings', 'numSupplier',  'numStock', 'numUser', 'numProduct', 'numOrder'))->with('toast_success', 'You are Logged In');
    }
}
