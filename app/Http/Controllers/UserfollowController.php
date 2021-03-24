<?php

namespace App\Http\Controllers;

use App\userfollow;
use Illuminate\Http\Request;

class UserfollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $auth_id=$request->input('auth_id');
       $user_id=$request->input('user_id');
       // dd($user_id);
       $validate=userfollow::where('auth_id',$auth_id)->where('user_id',$user_id)->get();

       if ($validate->isEmpty()) {
        $res=new userfollow;
        $res->auth_id=$request->input('auth_id');
        $res->user_id=$request->input('user_id');
        $res->follow_status=1;
        $res->save();
       }else{
        foreach ($validate as $key) {
            // dd($key->id);
           $res=userfollow::find($key->id);

          
           if ($res->follow_status == 0) {
              $res->follow_status=1;
              $res->save(); 
           }else{
            $res->follow_status=0;
            $res->save();
           }
           
        }

       }

       

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\userfollow  $userfollow
     * @return \Illuminate\Http\Response
     */
    public function show(userfollow $userfollow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\userfollow  $userfollow
     * @return \Illuminate\Http\Response
     */
    public function edit(userfollow $userfollow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\userfollow  $userfollow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userfollow $userfollow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\userfollow  $userfollow
     * @return \Illuminate\Http\Response
     */
    public function destroy(userfollow $userfollow)
    {
        //
    }
}
