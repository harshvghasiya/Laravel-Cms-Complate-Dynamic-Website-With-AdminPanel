<?php

namespace App;
use App\AdminLogin;
use App\BlogCatagory;
use App\BlogTag;
use App\blog;
use App\catagory;
use Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;


class blog extends Model
{
    
    const apm_id ='5';


    public function blog_id()
    {
    	return $this->belongsToMany(Catagory::class);
    }
    public function blog_tag()
    {
        return $this->hasmany(BlogTag::class,'blog_id','id');
    }

     public function created_email()
    {
        return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

     public static function getCatagoryDropdown()
     {  
     	return catagory::where('status','Active')->pluck('catagory','id')->toArray(); 
     }

    public static function getBlogCatagory($id)
      {
        $blogCategory=BlogCatagory::with(['catagory'])->where('blog_id',$id)->get();
        foreach ($blogCategory as $key => $value) {
            $y[]= $value->catagory->catagory;
        }
        return $y;
    }

     public static function getCatagoryUpdDropdown($id)
     {         
      if ($id != null) {
       return catagory::where('id',$id)->pluck('catagory','id')->toArray(); 

      }else{
        return catagory::where('status','Active')->pluck('catagory','id')->toArray(); 
      }
         
     
     }

     // Create Blogs

     public function createBlog()
     {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_blog')) {
           $tag_list=Tag::where('status','Active')->get();
           return view('admin.blog.addedit',compact('tag_list')); 
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('blogListMain');

        }
         
     }

    
     // Blog AllData

     public function BlogDatable()
     {
          $sql=blog::with(['created_email','blog_id']);
        
          return Datatables::of($sql)
                ->editColumn('status',   function($data){
                        if($data->status == "Active"){
                           return  '<a href="javascript:;" data-route="'.route('status_blog').'" class="btn default btn-xs blue status" data-status_id="'.$data->id.'"  data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                                   }else{

                            return    '<a href="javascript:;" data-route="'.route('status_blog').'" class="btn default btn-xs red status" data-status_id="'.$data->id.'"" data-status="'.$data->status.'">
                                        <i class="fa fa-edit"></i> '.$data->status.' </a>';
                               }  }) 

                ->addColumn('handle', function($data){
                            return '<a class="btn btn-danger del_data" data-route="'.route('del_blog').'" id="del_blog" data-del_id='.Crypt::encrypt($data->id).'> <i class="fa fa-trash"></i> </a>  
                              <a  href="'.route('edit_blog',Crypt::encrypt($data->id)).'" class="btn btn-warning" id="upd_country" > <i class="fa fa-edit"></i> </a> ';
                        })
                 ->editColumn('image', function($data){
                            return '<img src="'.$data->getBlogImageUrl().'" width="80px";
                                        height="60px";>';
                        }) 
                 ->editColumn('id', function($data){
                            return '<input type="checkbox" class="check" value="'.$data->id.'" name="check">';
                        })
                 ->editColumn('created_by', function($data){
                      if($data->created_email != null){
                            return '<a href="'.route('viewuser',Crypt::encrypt($data->created_email->email)).'" >'.$data->created_email->email.'</a>';
                      }
                        }) 
                 ->editColumn('catagory', function($data){
                        if (!$data->blog_id->isEmpty()) {
                            
                            foreach ($data->blog_id as $key => $value) {
                                $y[]=$value->catagory;
                            }
                         return $y;
                        }else{
                            return 'None';
                        }
                            
                        })
                        
                
                ->rawColumns(['status','handle','image','id','created_by'])
            
                ->make(true);
     }

     // Edit Blogs
     public function editBlog($id)
     {
         if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_blog')) {
            $ids=Crypt::decrypt($id);
            $edit=blog::with(['blog_id','blog_tag'])->find($ids);

            $check_catagory=BlogCatagory::where('blog_id',$ids)->pluck('catagory_id')->toArray();
            $catagory_list=catagory::where('status','Active')->get();

            $check_tag=BlogTag::where('blog_id',$ids)->pluck('tag_id')->toArray();
            $tag_list=Tag::where('status','Active')->get();
          

            return view('admin.blog.addedit',compact('edit','check_catagory','catagory_list','tag_list','check_tag'));
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('blogListMain');
        }

     }

     // Update Blog

     public function saveBlog($request)
     {        
        $id=$request->input('id');
        if (isset($id) && $id != null) {
            $res=Blog::find($id);             
            BlogCatagory::where('blog_id',$res->id)->delete();
            BlogTag::where('blog_id',$res->id)->delete();
        }else{
            $res=new Blog;
            $res->created_by=Auth::guard('adminlogin')->user()->id;
        }
       

        $image=$request->file('image');
        if ($image!= null) { 
          $image_name=UploadImage($image,Blog_Image_Path());
          $res->image=$image_name;
        }     
       
        $res->title=$request->input('title');
        $res->description=$request->input('description');
       
        $res->status=$request->input('status');
        $res->save();


        $catagory=$request->input('catagory');
        $tag=$request->input('tag');

        if (!empty($catagory)) {                
            foreach ($catagory as $key => $value) {                    
                $resu=new BlogCatagory;            
                $resu->blog_id=$res->id;
                $resu->catagory_id=$value;
                $resu->save();
            }
        }

        if (!empty($tag)) {
          foreach ($tag as $key => $value) {    
                $resu=new BlogTag;
                $resu->blog_id=$res->id;
                $resu->tag_id=$value;
                $resu->save(); 
            }                            
        }
       
         $errors="";
         $msg ="saved success.";
         flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);

     }

     // Status Blog

     public function statusBlog($request)
     {
         if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_blog')) {   
            $status=$request->input('status');
            $status_id=$request->input('status_id');
            $res=Blog::find($status_id);
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

    // StatusAll Blog
     public function statusAllBlog($request)
     {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_blog')) {  
             $status_id=$request->input('status_id');
              
                foreach ($status_id as $value) {    
                    $res=Blog::find($value);
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

    // Delete Blog

    public function deleteBlog($request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_blog')) {  
            $id=$request->input('del_id');
            $del_id=Crypt::decrypt($id);
            blog::destroy('id',$del_id);
               
        }else{
            return 'accessdenied';
        }
    }

    public function deleteAllBlog($request)
    {
         if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_all_blog')) {  
                $id=$request->input('del_id');
                foreach ($id as $key) {
                   blog::destroy($key);
               }
        }else{
            return 'accessdenied';
        }
    }

     // Front Methods

    public function searchBlog($request)
    {
        $search_val=$request->input('search');
        $search=blog::where('title','like','%'.$search_val.'%')->where('status','Active')->get();
        if ($search_val != null) {
              return view('front.search.index',compact('search','search_val'));
        }else{
            return redirect('/blog');
        }  
    }

    public function singleBlog($title)
    {
         $id=Crypt::decrypt($title);
        $all=blog::with(['blog_id'])->where('status','Active')->where('id',$id)->first();
        
        $author_desc=\App\setting::find(1);   
        $social_media=\App\SocialMedia::where('status','Active')->get();
        
        $tag=\App\BlogTag::where('blog_id',$all->id)->get();
        return view('front.blog.post',compact('all','tag','social_media','author_desc'));    
        
       
    }

    public function indexFrontBlog()
    {
         $all=Blog::where('status','Active')->paginate(4);
        return view('front.blog.index',compact('all'));
    }

    public function getBlogImageUrl()
    {
        $imgname=$this->image;

        $imagePath=BLog_Image_Exist().'/'.$imgname;
        $imageUrl=Blog_Image_Url().'/'.$imgname;

        if (file_exists($imagePath)) {
            return $imageUrl;
        }else{
            return No_Image_Url();
        }
    }



}
