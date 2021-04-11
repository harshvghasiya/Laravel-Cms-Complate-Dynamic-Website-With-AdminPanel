<?php

namespace App;

use App\Tag;
use App\blog;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
	protected $table='blog_tag';
    const apm_id ='7';

    public function tag()
    {
        return $this->belongsTo(Tag::class,'tag_id','id');
    }

     public function blog()
    {
    	return $this->belongsTo(blog::class,'blog_id','id');
    }

     
}
