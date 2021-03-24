<?php

namespace App\Http\Middleware;

use App\Accessuser;
use Closure;
use Illuminate\Support\Facades\Auth;

class AllAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$slug)
    {
        $user_id=Auth::guard('adminlogin')->user()->id;
        $access_user=\App\Accessuser::where('user_id',$user_id)->pluck('access_slug')->toArray();
        if ($access_user != null) {
            
            if (in_array($slug,$access_user)) {
                return $next($request);
            }else{
                flashMessage('danger','You Dont Have A Permission For This');
                return redirect('admin');
            }

        }
         flashMessage('danger','You Dont Have A Permission For This');
                return redirect('admin');
       
    }
}
