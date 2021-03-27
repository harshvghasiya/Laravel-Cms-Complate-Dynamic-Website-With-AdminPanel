<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class setting extends Model
{
    const apm_id ='30';

    public function createSetting()
    {
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'edit_setting')){
          $edit=setting::find('1');
          return view('admin.setting.addedit',compact('edit'));
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('admin');
        }
    }

    public function saveSetting($request)
    {
    	$id=$request->input('id');
        $res=setting::find($id);
    	$image=$request->file('image');
    	if($image != null){
        $image_name=UploadImage($image,Auther_Image_Path());
        $res->image=$image_name;
        }


       
         $res->first_email=$request->input('first_email');
         $res->second_email=$request->input('second_email');
         $res->first_mobile=$request->input('first_mobile');
         $res->second_mobile=$request->input('second_mobile');
         $res->author_name=$request->input('author_name');
         $res->web_url=$request->input('web_url');
         $res->address=$request->input('address');
         $res->author_decription_sidebar=$request->input('author_decription_sidebar');
         $res->author_decription_footer=$request->input('author_decription_footer');
       
         $res->save();
         $errors="";
          $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }
    
}
