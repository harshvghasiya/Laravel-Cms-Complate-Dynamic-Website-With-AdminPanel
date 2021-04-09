<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogUpdValidationRequest;
use App\Http\Requests\BlogValidationRequest;
use App\Tag;
use App\blog;
use App\catagory;
use Illuminate\Http\Request;


class BlogController extends Controller
{

      function __construct()
    { 
        $this->Model=new blog;
        $apm_id=blog::apm_id;
        $this->middleware('access:'.$apm_id.'')->except(['indexFrontBlog','showFrontBlog','post_show','search']); 
    }

    public function create()
    {
       return $this->Model->createBlog();
    }

    public function store_update(BlogValidationRequest $request)
    {
        return $this->Model->saveBlog($request);
      
    }

    public function show(blog $blog)
    {
        return view('admin.blog.bloglist');
    }

       public function blog_datable()
    {
        return $this->Model->BlogDatable();
    }

    public function edit(blog $blog,$id)
    {
        return $this->Model->editBlog($id);
    }

    public function status_blog(Request $request)
    {
        return $this->Model->statusBlog($request);
    }

     public function status_all(Request $request)
    {
      return $this->Model->statusAllBlog($request);
    }

    public function destroy(blog $blog,Request $request)
    {
        return $this->Model->deleteBlog($request);
    }

    public function del_all(blog $blog,Request $request)
    {
        return $this->Model->deleteAllBlog($request);
    }

    public function search(Request $request)
    {
      return $this->Model->searchBlog($request);                  
    }

    public function indexFrontBlog()
    {
       return $this->Model->indexFrontBlog();
    }

    public function showFrontBlog($title)
    {   
       return $this->Model->singleBlog($title);    
    }

    public function post_show(FrontBlog $FrontBlog)
    {
        $all=Blog::where('status','Active')->get();
        return view('front.blog.index',compact('all'));
    }
}