<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Crypt;
use Yajra\Datatables\Datatables;

class testimonial extends Model
{
    const apm_id ='28';
    public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

    public function createTestimonial()
    {
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'add_test')){
          return view('admin.testimonial.addedit');
        }else{
            flashMessage('danger','Access');
            return redirect()->route('testimonialListMain');
        }
    }

    public function saveTestimonial($request)
    {
        $id=$request->input('id');
        if (isset($id) && $id != null) {
            $res=testimonial::find($id);
        }else{
            $res=new testimonial;
        }
    	 
        $image=$request->file('image');
        if ($image != null) {
            $image_name=UploadImage($image,Testimonial_Image_Path());
            $res->image=$image_name;
        }
        $res->created_by=Auth::guard('adminlogin')->user()->id;
        $res->name=$request->input('name');
        $res->role=$request->input('role');
        $res->about=$request->input('about');
        $res->status=$request->input('status');
       
        $res->save();
        $errors="";
        $msg ="saved success.";
        return response()->json(['success' => true,'msg'=>$msg, 'status'=>1,'errors' => $errors]);
        
    }

    public function datableTestimonial()
    {
    	 $sql=testimonial::with(['created_email']);
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_Testimonial').'"  class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_Testimonial').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){

                            return '<a class="btn btn-danger del_data" data-route="'.route('del_Testimonial').'" id="del_Testimonial" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_Testimonial',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                ->editColumn('image', function($data){
                            return '<img src="'.$data->getTestimonialImageUrl().'" width="80px";
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
                 
                
                ->rawColumns(['status','handle','image','id','created_by'])
            
                ->make(true);
    }

    public function editTestimonial($id)
    {
    	 if(Allacceess(Auth::guard('adminlogin')->user()->id,'edit_test')){    
            $eid=Crypt::decrypt($id);
           
            $edit=testimonial::find($eid);
            return view('admin.testimonial.addedit',compact('edit'));
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('testimonialListMain');

        }
    }

    public function statusTestimonial($request)
    {
    	 if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_test')){
            $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=testimonial::find($status_id);
            if ($status=='Active') {   
                $res->status="InActive";
                $res->save();
            }else{
                $res->status="Active";
                $res->save();
            }
        }else{
            return 'accessdenied';
        }
    }

    public function deleteTestimonial($request)
    {
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'del_test')){

            $id=$request->input('del_id');
            $del_id=Crypt::decrypt($id);
            testimonial::destroy($del_id);
        }else{
            return 'accessdenied';
        }
    }

    public function statusAllTestimonial($request)
    {
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_test')){    
             $id=$request->input('status_id');
            foreach ($id as $key) {
               $res=testimonial::find($key);

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

    public function deleteAllTestimonial($request)
    {
    	 if(Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_test')){
            $id=$request->input('del_id');
            foreach ($id as $key) {
              testimonial::destroy($key);
            }
        }else{
            return 'accessdenied';
        }
    }

    public function getTestimonialImageUrl()
    {
        $imgname= $this->image;

        $imagePath=Testimonial_Image_Exist().'/'.$imgname;
        $imageUrl=Testimonial_Image_Url().'/'.$imgname;

        if (file_exists($imagePath)) {
            return $imageUrl;
        }else{
            return No_Image_Url();
        }
    }
    
    
}
