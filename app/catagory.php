<?php

namespace App;
use App\blog_catagory;
use Illuminate\Database\Eloquent\Model;

class catagory extends Model
{

    const apm_id ='6';

    
      public function blog_catagory()
    {
    	return $this->hasmany(blog_catagory::class,'catagory_id','id');
    }

    public static function CatagoryCount($id)
    {
    	$sql=blog_catagory::where('catagory_id',$id)->count();
    	return $sql;
    }

     
      public static function getPostCatagory($id)
      {

        $blogCategory=blog_catagory::with(['catagory'])->where('blogs_id',$id)->get();
        foreach ($blogCategory as $key => $value) {
            $y[]= $value->catagory->catagory;
        }
        return $y;
    }

    public function created_email()
    {
        return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

     
}
