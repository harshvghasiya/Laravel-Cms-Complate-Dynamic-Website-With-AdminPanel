<?php

namespace App\Http\Controllers;

use App\blog;
use App\front_blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FrontBlogController extends Controller
{
    
    public function index()
    {
        $all=front_blog::where('status','Active')->paginate(4);
        return view('front.blog.index',compact('all'));
    }
    
    public function show(front_blog $front_blog,$title)
    {   
        $id=Crypt::decrypt($title);
        $all=front_blog::where('status','Active')->where('id',$id)->first();

        $author_desc=\App\setting::find(1);   
        $social_media=\App\social_media::where('status','Active')->get();
        $tag=\App\blog_tag::where('blog_id',$all->id)->get();
        return view('front.blog.post',compact('all','tag','social_media','author_desc'));  
        
    }

    public function search(front_blog $front_blog,Request $request)
    {
         $search_val=$request->input('search');
         $search=blog::where('title','like','%'.$search_val.'%')->get();
         if ($search_val != null) {
              return view('front.search.index',compact('search','search_val'));
         }else{
            return redirect('/blog');
         }
        
              
    }

    public function post_show(front_blog $front_blog)
    {
        $all=front_blog::where('status','Active')->get();
        return view('front.blog.index',compact('all'));
    }

}
