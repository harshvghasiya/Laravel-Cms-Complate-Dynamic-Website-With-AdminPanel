<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function __construct()
    {
        $this->Model=new User;
        $this->middleware('guest')->except('logout');
    }

    public function login(UserLoginRequest $request)
    {
       return $this->Model->loginUser($request);
    }

    public function logout()
    {
        Auth::logout();
        flashMessage('success','Logout SuccessFully');
        return redirect()->route('home');
    }
}
