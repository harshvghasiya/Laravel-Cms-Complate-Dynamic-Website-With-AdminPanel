<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(UserRegisterRequest $request)
    {
        $res=new user;
        $res->email=$request->input('email');
        $res->name=$request->input('name');
        $res->password=Hash::make($request->input('password'));
        $res->save();

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {
     
        $errors="";
        $msg ="Login Successfully.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);

        }

        $errors="Cant Login";
        $msg ="Enter Valid Password Or Email.";
        flashMessage('danger',$msg);
        
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
  
}
