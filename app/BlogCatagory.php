<?php

namespace App;
use App\blog;
use App\catagory;
use Illuminate\Database\Eloquent\Model;

class BlogCatagory extends Model
{  
    protected $table='blog_catagory'; 
    const apm_id ='6';
    

    public function blog()
    {
    	return $this->belongsTo(blog::class,'blog_id','id');
    }
     public function catagory()
    {
    	return $this->belongsTo(catagory::class,'catagory_id','id');
    }

    

}
