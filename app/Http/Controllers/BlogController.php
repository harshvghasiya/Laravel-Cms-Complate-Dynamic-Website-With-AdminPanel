<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogUpdValidationRequest;
use App\Http\Requests\BlogValidationRequest;
use App\Tag;
use App\blog;
use App\blog_catagory;
use App\blog_tag;
use App\catagory;
use Crypt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class BlogController extends Controller
{

      function __construct()
    { 
        $apm_id=blog::apm_id;
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
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_blog')) {
         $tag_list=Tag::where('status','Active')->get();
         // dd($tag_list);
           return view('admin.blog.addedit',compact('tag_list')); 
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('blogListMain');

        }
         

    }

    /**
     * Store a newly created resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogValidationRequest $request)
    {
        $input=$request->all();
        // dd($input);
        $image=$request->file('image');
        $exe=$image->extension();
        $image_name=time().'.'.$exe;
        $image->storeAs('/public/blogimage',$image_name);

      

        $res=new Blog;
        $res->title=$input['title'];
        $res->description=$input['description'];
        $res->image=$image_name;
        $res->created_by=Auth::guard('adminlogin')->user()->id;
        $res->status=$input['status'];
        $res->save();
        

        $catagory=$input['catagory'];
        foreach ($catagory as $result) {
             $cat=new blog_catagory;
             $cat->catagory_id=$result;
             $cat->blogs_id=$res->id;
             $cat->save();
        }

        $tag=$input['tag'];
        foreach ($tag as $result) {
             $teg=new blog_tag;
             $teg->tag_id=$result;
             $teg->blog_id=$res->id;
             $teg->save();
        }


       
       

        

          $errors="";
          $msg ="saved success.";
          flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        return view('admin.blog.bloglist');
    }

       public function blog_datable()
    {
          
          $sql=blog::with(['created_email']);
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
                            return '<img src="'.asset("/public/storage/blogimage/$data->image").'" width="80px";
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
                            return \App\blog::getBlogCatagory($data->id);
                        })
                
                ->rawColumns(['status','handle','image','id','created_by'])
            
                ->make(true);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog,$id)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'add_blog')) {
            $ids=Crypt::decrypt($id);
            $edit=blog::with(['blog_id','blog_tag'])->find($ids);

            $check_catagory=blog_catagory::where('blogs_id',$ids)->pluck('catagory_id')->toArray();
            $catagory_list=catagory::where('status','Active')->get();

            $check_tag=blog_tag::where('blog_id',$ids)->pluck('tag_id')->toArray();
            $tag_list=Tag::where('status','Active')->get();
          

            return view('admin.blog.addedit',compact('edit','check_catagory','catagory_list','tag_list','check_tag'));
        }else{
            flashMessage('danger','Access Denied');
            return redirect()->route('blogListMain');
        }

    }

    /**
     * Update the specified resource in public/storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdValidationRequest $request, blog $blog)
    {
        $id=$request->input('id');
        $res=Blog::find($id);

        $image=$request->file('image');
        if ($image!= null) {
        $exe=$image->extension();
        $image_name=time().'.'.$exe;
        $image->storeAs('/public/blogimage',$image_name);
        $res->image=$image_name;
        }
       
       
       
        $res->title=$request->input('title');
        $res->description=$request->input('description');
       
        $res->status=$request->input('status');
        $res->save();


         $catagory=$request->input('catagory');
         $tag=$request->input('tag');
       if ($catagory != null) {
            // dd($catagory);

          foreach ($catagory as $key) {
            $ids=blog_catagory::where('blogs_id',$id)->where('catagory_id',$key)->first();
            $del=blog_catagory::where('blogs_id',$id)->pluck('id')->toArray();


            // dd($ids);
            if ($ids != null){


              if (in_array($ids->id,$del)) {
                    foreach ($del as $k) {


                      if ($k != $ids->id) {

                        blog_catagory::destroy($k);
                        }
                    }
                      // return redirect('/product');
                }
            }else{
                $resu=new blog_catagory;
                $resu->blogs_id=$id;
                $resu->catagory_id=$key;
                $resu->save();
                // dd('hj');

                     
             }  
        }
     }


          if ($tag != null) {
            // dd($catagory);
          foreach ($tag as $key) {
            $ids=blog_tag::where('blog_id',$id)->where('tag_id',$key)->first();
            $del=blog_tag::where('blog_id',$id)->pluck('id')->toArray();


            // dd($ids);
            if ($ids != null){


              if (in_array($ids->id,$del)) {
                    foreach ($del as $k) {


                      if ($k != $ids->id) {

                        blog_tag::destroy($k);
                        }
                    }
                      // return redirect('/product');
                }
            }else{
                $resu=new blog_tag;
                $resu->blog_id=$id;
                $resu->tag_id=$key;
                $resu->save();
                          
             }  
        }
     }
       

         $errors="";
         $msg ="saved success.";
         flashMessage('success',$msg);
        return response()->json(['success' => true,'msgs'=> $msg, 'status'=>1,'errors' => $errors]);


    }


    public function status_blog(Request $request)
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


     public function status_all(Request $request)
    {
       if (Allacceess(Auth::guard('adminlogin')->user()->id,'status_all_blog')) {  
             $status_id=$request->input('status_id');
              // dd($status_id);
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


    /**
     * Remove the specified resource from public/storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog,Request $request)
    {
        if (Allacceess(Auth::guard('adminlogin')->user()->id,'del_blog')) {  
            $id=$request->input('del_id');
            $del_id=Crypt::decrypt($id);
            blog::destroy('id',$del_id);
                // flashMessage('success','Delete Successfully');
        }else{
            return 'accessdenied';
        }
    }

    public function del_all(blog $blog,Request $request)
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
}