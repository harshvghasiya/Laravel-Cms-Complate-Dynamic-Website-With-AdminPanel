<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;    
use Crypt;

class SocialMedia extends Model
{
    const apm_id ='15';

    public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

    public function createSocialMedia()
    {
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'add_some')){
          return view('admin.social_media.addedit');
        }else{
            return redirect()->route('someListMain');
        }
    }

    public function saveSocialMedia($request)
    {
    	 $id=$request->input('id');
       if ($id != null) {
           $res= SocialMedia::find($id);
       }else{
         $res= new SocialMedia;
       }

        $image=$request->file('icon');
        if ($image != null) {
          $image_name=UploadImage($image,SocialMedia_Image_Path());
          $res->icon=$image_name;
       }
       
        $res->title=$request->input('title');
        $res->url=$request->input('url');
       
        $res->status=$request->input('status');
        $res->save();
        $errors="";
        $msg ="saved success.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);
    }

    public function datableSocialMedia()
    {
    	  $sql=SocialMedia::with(['created_email']);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_some').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_some').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_some').'" id="del_some" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_some',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                 ->editColumn('icon', function($data){
                            return '<img src="'.$data->getSocialMediaImageUrl().'" width="80px";
                                        height="60px";>';
                        })
                 ->editColumn('created_by', function($data){
                      if($data->created_email != null){
                            return '<a href="'.route('viewuser',Crypt::encrypt($data->created_email->email)).'" >'.$data->created_email->email.'</a>';
                      }
                        })
                 ->editColumn('id', function($data){
                            return  '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })
                 
                
                ->rawColumns(['status','handle','icon','id','created_by'])
            
                ->make(true);
    }

    public function editSocialMedia($id)
    {
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'add_some')){
            $ids=Crypt::decrypt($id);
            $edit=SocialMedia::find($ids);
            return view('admin.social_media.addedit',compact('edit'));
        }else{
           flashMessage('danger','Access Denied');
           return redirect()->route('someListMain');
        }
    }

    public function statusSocialMedia($request)
    {
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_some')){
           $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=SocialMedia::find($status_id);
            if ($status=='Active') {
                $res->status='InActive';
                $res->save();
            }else{
                $res->status='Active';
                $res->save();
            }
        }else{
            return 'accessdenied';
        }
    }

    public function statusAllSocialMedia($request)
    {
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_some')){
                $status_id=$request->input('status_id');
               
                foreach ($status_id as $value) {
          
                $res=SocialMedia::find($value);
                if ($res->status=='Active') {
                    $res->status='InActive';
                    $res->save();
                    
                }else{
                    $res->status='Active';
                    $res->save();
                }
              }
        }else{
            return 'accessdenied';
        }
    }

    public function deleteSocialMedia($request)
    {
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'delete_some')){ 
            $id=$request->input('del_id');
            $del_id=Crypt::decrypt($id);
            SocialMedia::destroy($del_id);
        }else{
             return 'accessdenied';
        }
    }

    public function deleteAllSocialMedia($request)
    {
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_some')){
            $id=$request->input('del_id');
           foreach ($id as $key) {
             SocialMedia::destroy($key);
           }
        }else{
            return 'accessdenied';
        }
    }

    public function getSocialMediaImageUrl()
    {
      $imgname=$this->icon;
      $imagePath=Social_Media_Image_Check_Exist_Path().'/'.$imgname;
      $imageUrl=Social_Media_Image_Upload_Url().'/'.$imgname;

      if (file_exists($imagePath)) {
        return $imageUrl;
      }else{
        return No_Image_Url(); 
      }
    }
    
   
}
