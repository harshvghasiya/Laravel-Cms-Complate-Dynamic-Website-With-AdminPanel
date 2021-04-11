<?php

namespace App;

use App\BlogTag;
use App\blog;
use Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class Tag extends Model
{
    public function tag_rel()
    {
    	return $this->belongsToMany(Blog::class);
    }
    public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

    public function createTag()
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_tag')) {  
           return view('admin.blog_tag.edit');
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('catagoryListMain');
        }
    }

    public function saveTag($request)
    {
    	$id=$request->input('id');
    	if($id != null){
         $res=Tag::find($id);
    	}else{
    	$res=new Tag;
    	$res->created_by=Auth::guard('adminlogin')->user()->id;
        }

        $res->tag=$request->input('tag');
        $res->status=$request->input('status');
        $res->save();

        $errors='';
         $msg ="saved success.";
        flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    public function datableTag()
    {   	  
          $sql=Tag::with(['created_email']);
          
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_tag').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_tag').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_tag').'" id="del_tag" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_tag',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                ->editColumn('created_by', function($data){
                      if($data->created_email != null){
                            return '<a href="'.route('viewuser',Crypt::encrypt($data->created_email->email)).'" >'.$data->created_email->email.'</a>';
                      }
                        })
                 ->editColumn('id', function($data){
                            return '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })             
                
                ->rawColumns(['status','handle','id','created_by'])
            
                ->make(true);
    }

    public function editTag($id)
    {
    	if(Allacceess(Auth::guard('adminlogin')->user()->id,'edit_tag')){
            $ids=Crypt::decrypt($id);
            $edit=Tag::find($ids);
            return view('admin.blog_tag.edit',compact('edit'));
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('catagoryListMain');
        }
    }

    public function statusTag($request)
    {
    	 if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_tag')) {   
                $status=$request->input('status');
                $status_id=$request->input('status_id');
                $res=Tag::find($status_id);
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

    public function deleteTag($request)
    {
    	 if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_tag')) {  
           $id=$request->input('del_id');
           $del_id=Crypt::decrypt($id);
           Tag::destroy($del_id);
        }else{
            return 'accessdenied';
        }
    }

    public function deleteAllTag($request)
    {
    	if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_tag')) {    

                $id=$request->input('del_id');
                foreach ($id as $key) {
                    $sql=BlogTag::where('tag_id',$key)->first();
                    if ($sql != null) {
                        return 'no';
                    }else{
                       Tag::destroy($key);
                   }
               }
        }else{
            return 'accessdenied';
        }
    }

    public function statusAllTag($request)
    {
    	 if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_tag')) {    
                $status_id=$request->input('status_id');
                
                foreach ($status_id as $value) {

                    $res=Tag::find($value);
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


    public function frontTagIndex($tag)
    {
        $tag_blog=\App\Tag::with(['tag_rel'])->where('tag',$tag)->get();
        if($tag_blog != null){
            return view('front.tag.index',compact('tag_blog','tag'));
        }else{
            return 'No Tag Found';
        }
   
    }

  

    
}
