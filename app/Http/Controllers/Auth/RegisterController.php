<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function __construct()
    {
        $this->Model=new User;
        $this->middleware('guest');
    }

    public function register(UserRegisterRequest $request)
    {
       return $this->Model->registerUser($request);
    }

  
}
