<?php

namespace App;

use App\AdminLogin;
use Illuminate\Database\Eloquent\Model;
use Crypt;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;


class banner extends Model
{
	 const apm_id ='4';

	 // Reletions

     public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

   

    // Datatable
    public function BannerDatable()
    {
    	    $sql=banner::with(['created_email']);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_banner').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_banner').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data"  data-route="'.route('del_banner').'" id="del_banner" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_banner',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                 ->editColumn('image', function($data){
                            return '<img src="'.$data->getBannerImageUrl().'" width="80px";
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
                ->rawColumns(['status','handle','image','id','created_by'])
            
                ->make(true);
    }
    // Create Banner
    public function createBanner()
    {	
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'add_banner')){
           return view('admin.banner.addedit');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('bannerListMain');
        }
    }

    // Save Banner
    public function saveBanner($request){

    	$input=$request->all();
        $image=$request->file('image');
        $id=$request->input('id');

        if ($id != null) {
            $res=banner::find($id);
           

        }else{
            $res=new banner;
           
        }
        if ($image != null) {
            $image_name=UploadImage($image,Banner_Image_Path());
            $res->image=$image_name;
        } 

          

        $res->name=$input['name'];
        $res->url=$input['url'];
        $res->status=$input['status'];
        
        $res->created_by=Auth::guard('adminlogin')->user()->id;
        $res->save();


        $errors="";
        $msg ="saved success.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    // 

    public function editBanner($id)
    {
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'edit_banner')){

        $ids=Crypt::decrypt($id);
        $edit=banner::find($ids);
        return view('admin.banner.addedit',compact('edit'));

       }else{
           flashMessage('danger','Access Denied');
            return redirect()->route('bannerListMain');
       }
    }
    
    // Status 
    public function status($request)
    {
    	 if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_banner')){


            $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=banner::find($status_id);
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

    // Status All

    public function status_all($request)
    {
    	 if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_banner')) {
                $status_id=$request->input('status_id');
        
                foreach ($status_id as $value) {
                    
                    
                    $res=banner::find($value);
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

    // Destroy

    public function deleteBanner($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_banner')) {
	        $id=$request->input('del_id');
	        $del_id=Crypt::decrypt($id);
	        banner::destroy($del_id);

	    }else{
	    	return 'accessdenied';
	    }     
    }

    public function delallBanner($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_banner')) {
           $id=$request->input('del_id');
           foreach ($id as $key) {
           banner::destroy($key);
           }
        }else{
            return 'accessdenied';
        }
    }

    // Banner Image Url

    public function getBannerImageUrl()
    {
       $imgname=$this->image;

       $imagePath=Banner_Image_Check_Exist_Path().'/'.$imgname;
       $imageUrl=Banner_Image_Upload_Url().'/'.$imgname;
       if (file_exists($imagePath)) {
           return $imageUrl;

       }else{
           return No_Image_Url();
       }
    }



    

   
}
