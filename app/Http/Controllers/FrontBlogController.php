<?php

namespace App\Http\Controllers;

use App\blog;
use App\FrontBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FrontBlogController extends Controller
{
    function __construct()
    {
      $this->Model=new FrontBlog;
    }

    public function index()
    {
       return $this->Model->indexFrontBlog();
    }
    
    public function show(FrontBlog $FrontBlog,$title)
    {   
       return $this->Model->singleBlog($title);
        
    }

    public function search(FrontBlog $FrontBlog,Request $request)
    {
      return $this->Model->searchBlog($request);                  
    }

    public function post_show(FrontBlog $FrontBlog)
    {
        $all=FrontBlog::where('status','Active')->get();
        return view('front.blog.index',compact('all'));
    }

}
