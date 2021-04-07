<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccessControlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$apm_id)
    {
        
      $user_id=Auth::guard('adminlogin')->user()->id;
      $apm_user=\App\apm_user::where('user_id',$user_id)->pluck('apm_id')->toArray();


     if ($apm_user != null) {
         if (in_array($apm_id,$apm_user)) {

             return $next($request);

         }else{

            flashMessage('danger','You Dont Have Permision For This');
            return redirect()->route('admin');

         }
     } 
        flashMessage('danger','You Dont Have Permision For This');
        return redirect()->route('admin');
        
    }


}
