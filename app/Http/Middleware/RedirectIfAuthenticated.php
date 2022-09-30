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
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            
            // if (Auth::guard($guard)->check()  && Auth::user()->role == 'Admin')
            //  {
            //     return redirect(RouteServiceProvider::HOME);
            // }
            if (Auth::guard($guard)->check() && Auth()->user()->role == 'Admin')
             {
                // return redirect()->route('admin.dashboard');
                return redirect(RouteServiceProvider::ADMIN);
            }
            elseif(Auth::guard($guard)->check()  && Auth()->user()->role == 'Staff') {
                // return redirect()->route('staff.dashboard');
                return redirect(RouteServiceProvider::STAFF);
            }
             elseif(Auth::guard($guard)->check() && Auth()->user()->role == 'Student') {

                return redirect(RouteServiceProvider::STUDENT);
            }
            else{
                // return view('auth.login');
                Auth::check();
            }
        }

        return $next($request);
    }
}
