<?php

namespace App;

use App\module;
use Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\abort;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class cms extends Model
{
  const apm_id ='8';
  const CONST_OUR_TOP_WEB_DEVELOPMENT_SOLUTION = '6';

    public function module()
    {
    	return $this->belongsTo(module::class,'module_id','id');
    }

      public static function getModuleDropdown()
      { 
      	  return module::where('status','Active')->pluck('name','id')->toArray();
      }
       public static function getParentDropdown()
      { 
      	  return cms::where('status','Active')->pluck('name','id')->toArray();
      }

     public function created_email()
    {
        return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

    // Create Cms

    public function createCms()
    {
      if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_cms')) {    
 
          return view('admin.cms.addedit');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('cmsListMain');
        }   
    }

    // Store Cms
    public function storeCms($request)
    {
        $id=$request->input('id');
        if (isset($id) && $id != null) {
            $res= cms::find($id);
        }else{
            $res=new cms; 
        } 
        $input=$request->all();
       
        $image=$request->file('image');
        if ($image != null) {
           $image_name=UploadImage($image,Cms_Image_Path());
           $res->image=$image_name;
        }

        
        $res->name=$input['name'];
        $res->secondary_title=$input['secondary_title'];
        $res->display_on_header=$input['display_on_header'];
        $res->display_on_footer=$input['display_on_footer'];
        $res->status=$input['status'];
        
        if (isset($input['parent_id'])) {
             $res->parent_id=$input['parent_id'];
        }
        $res->created_by=Auth::guard('adminlogin')->user()->id;
        $res->module_id=$input['module'];
        $res->seo_title=$input['seo_title'];
        $res->seo_keyword=$input['seo_keyword'];
        $res->seo_description=$input['seo_description'];

        $res->short_description=$input['short_description'];
        $res->long_description=$input['long_description'];
        $res->save();

        $errors="";
        $msg ="saved success.";
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    // Cms Data Tabale
    public function databaleCms()
    {
       $sql=cms::with(['module']);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_cms').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_cms').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_cms').'" id="del_cms" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_cms',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                 ->editColumn('image', function($data){
                            return '<img src="'.$data->getCmsImageUrl().'" width="80px";
                                        height="60px";>';
                        }) 
                 ->editColumn('created_by', function($data){
                      if($data->created_email != null){
                            return '<a href="'.route('viewuser',Crypt::encrypt($data->created_email->email)).'" >'.$data->created_email->email.'</a>';
                      }
                        })
                 ->editColumn('id', function($data){
                            return '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })
                 ->editColumn('module', function($data){
                            return $data->module->name;
                        })
                
                ->rawColumns(['status','handle','image','id','created_by'])
            
                ->make(true);
    }
    // Edit Cms

    public function editCms($id)
    {
      if (Allacceess(Auth::guard('adminlogin')->user()->id,'edit_cms')) {    
                $ids=Crypt::decrypt($id);
                $edit=cms::find($ids);
                return view('admin.cms.addedit',compact('edit'));
        }else{
          flashMessage('danger','Acceess Denied');
          return redirect()->route('cmsListMain');
        }
    }

    // Status Cms
    public function statuCms($request)
    {
      if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_cms')) {      
                $status_id=$request->input('status_id');
               
                foreach ($status_id as $value) {
          
                $res=cms::find($value);
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

    // Status All Cms
    public function statusAllCms($request)
    {
      if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_cms')) {      
                $status_id=$request->input('status_id');
                // dd($status_id);
                foreach ($status_id as $value) {
          
                $res=cms::find($value);
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

    public function statusCms($request)
    {
       if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_cms')) {    
 
            $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=cms::find($status_id);
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

    public function deleteCms($request)
    {
       if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_cms')) {    
            $id=$request->input('del_id');
            $del_id=Crypt::decrypt($id);
            $sql=cms::where('parent_id',$del_id)->first();
            
            if ($sql != Null) {
                return 'No';
            }else{
               cms::destroy($del_id);
            }
        }else{
            return 'accessdenied';
        }
    }

    public function deleteAllCms($request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_cms')) {    
            $id=$request->input('del_id');
            foreach ($id as $key) {
            $sql=cms::where('parent_id',$key)->first();
            if ($sql != null) {
                return 'no';
            }else{
             cms::destroy($key);
            }
           }
        }else{
            return 'accessdenied';
        }
    }

    public function getCmsImageUrl()
    {
        $imgname=$this->image;
        $imagePath=Cms_Image_Exist().'/'.$imgname;
        $imageUrl=Cms_Image_Url().'/'.$imgname;

        if (file_exists($imagePath)) {
             return $imageUrl;
        }else{
            return No_Image_Url();
        } 
    }

    public function getCmsPageContent($cms)
    {
      $cms_content=cms::where('name',$cms)->first();
      if($cms_content != null){
      return view('front.CmsContent.cms_content',compact('cms_content'));
      }else{
        return abort(404);
      }
    }



   
}
