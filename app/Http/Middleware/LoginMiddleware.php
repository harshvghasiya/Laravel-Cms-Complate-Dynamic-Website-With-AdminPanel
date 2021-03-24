<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\AdminLogin;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {  
        // dd(Auth::user());
        if (Auth::guard('adminlogin')->check() && Auth::guard('adminlogin')->user()->status=='Active') {
           return $next($request);
        }else{
            if (isset(Auth::guard('adminlogin')->user()->status)) {
               flashMessage('danger','Status InActive'); 
            }else{
                // dd($request);
                flashMessage('danger','Invalid Email or Password');
            }
            
            return redirect('/admin/login');
        }
        
    }
}
