<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
        if (Auth::user()->is_admin == 1) {
            return redirect(url('/admin/dashboard'));
        } elseif (Auth::user()->is_admin == 2) {
            return redirect(url('/manager/dashboard'));
        } elseif (Auth::user()->is_admin == 3){
            return redirect(url('/storekeeper/dashboard'));
        }
        else {
            return redirect(url('/staff/dashboard'));
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {



        $input = $request->all();

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if (auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
            if (Auth::user()->is_admin == 1)
            {
                return redirect(route('dashboard',))->with('toast_success', 'You are Logged In');
            }
            elseif (Auth::user()->is_admin == 2)
            {
                return redirect()->route('managerdashboard',)->with('toast_success', 'You are Logged In');
            }
            elseif (Auth::user()->is_admin == 3)
            {
                return redirect()->route('storekeeperdashboard')->with('toast_success', 'You are Logged In');
            }
            else
            {
                return redirect()->route('staffdashboard')->with('toast_success', 'You are Logged In');
            }
        }
        else
        {
            return redirect()->route('login')->with('error', 'Invalid Email or Password.');
        }
    }
}
