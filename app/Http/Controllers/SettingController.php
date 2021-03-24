<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingValidationRequest;
use App\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
      function __construct()
    { 
        $apm_id=setting::apm_id;
        $this->middleware('access:'.$apm_id.''); 
    }
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
        if(Allacceess(Auth::guard('adminlogin')->user()->id,'edit_setting')){
          $edit=setting::find('1');
          return view('admin.setting.addedit',compact('edit'));
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('admin');
           }
    }

    /**
     * Store a newly created resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(SettingValidationRequest $request, setting $setting)
    {

          $image=$request->file('image');
        $exe=$image->extension();
        $image_name=time().'.'.$exe;
        $image->storeAs('/public/authorimage',$image_name);


         $id=$request->input('id');
         $res=setting::find($id);
         $res->first_email=$request->input('first_email');
         $res->second_email=$request->input('second_email');
         $res->first_mobile=$request->input('first_mobile');
         $res->second_mobile=$request->input('second_mobile');
         $res->author_name=$request->input('author_name');
         $res->web_url=$request->input('web_url');
         $res->address=$request->input('address');
         // dd($request->input('address'));
         $res->author_decription_sidebar=$request->input('author_decription_sidebar');
         $res->author_decription_footer=$request->input('author_decription_footer');
         $res->image=$image_name;
         $res->save();
         $errors="";
          $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);

    }

    /**
     * Remove the specified resource from public/storage.
     *
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        //
    }
}
