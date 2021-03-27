<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use App\blog;

class FrontBlog extends Model
{
    protected $table="blogs";

    public function indexFrontBlog()
    {
    	 $all=FrontBlog::where('status','Active')->paginate(4);
        return view('front.blog.index',compact('all'));
    }

    public function singleBlog($title)
    {
    	 $id=Crypt::decrypt($title);
        $all=FrontBlog::where('status','Active')->where('id',$id)->first();

        $author_desc=\App\setting::find(1);   
        $social_media=\App\SocialMedia::where('status','Active')->get();
        $tag=\App\BlogTag::where('blog_id',$all->id)->get();
        return view('front.blog.post',compact('all','tag','social_media','author_desc'));  
    }

    public function searchBlog($request)
    {
    	 $search_val=$request->input('search');
         $search=blog::where('title','like','%'.$search_val.'%')->get();
         if ($search_val != null) {
              return view('front.search.index',compact('search','search_val'));
         }else{
            return redirect('/blog');
         }  
    }
}
