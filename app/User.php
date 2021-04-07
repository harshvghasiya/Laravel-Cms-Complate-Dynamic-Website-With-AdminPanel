<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registerUser($request)
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

    public function loginUser($request)
    {
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
}
