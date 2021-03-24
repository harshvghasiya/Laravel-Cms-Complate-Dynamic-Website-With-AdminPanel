<?php

namespace App;

use App\blog_tag;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function tag_rel()
    {
    	return $this->hasMany(blog_tag::class,'tag_id','id');
    }
    public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

  

    
}
