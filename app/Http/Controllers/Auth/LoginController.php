<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(UserLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {
     
        $errors="";
        $msg ="Login Successfully.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);

        }

        $errors="Cant Login";
        $msg ="Enter Valid Password Or Email.";
        
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
