<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

//         foreach ($guards as $guard) {
//             if (Auth::guard($guard)->check()) {
////                 return redirect(RouteServiceProvider::HOME);
//                 return redirect()->back()->with('error', 'Opps! Already Logged In');
//             }
//         }

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

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

//                return redirect(url('/auth/logout'));
            }
//
        }
        return $next($request);

    }
}
