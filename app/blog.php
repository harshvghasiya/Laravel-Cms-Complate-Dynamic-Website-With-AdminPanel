<?php

namespace App;
use App\AdminLogin;
use App\blog_catagory;
use App\blog_tag;
use App\catagory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    
    const apm_id ='5';


    public function blog_id()
    {
    	return $this->hasmany(blog_catagory::class,'blogs_id','id');
    }
    public function blog_tag()
    {
        return $this->hasmany(blog_tag::class,'blog_id','id');
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

        $blogCategory=blog_catagory::with(['catagory'])->where('blogs_id',$id)->get();
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


    //  public static function getBlog()
    //   {

    //     $all=blog::where('status','Active')->get();
       
    //     return view('front.blog.index',compact('all'));
    // }

}
