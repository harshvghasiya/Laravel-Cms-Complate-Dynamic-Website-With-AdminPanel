<?php

namespace App;

use App\Tag;
use App\blog;
use Illuminate\Database\Eloquent\Model;

class blog_tag extends Model
{
    const apm_id ='7';

    public function tag_rel()
    {
        return $this->belongsTo(Tag::class,'tag_id','id');
    }

     
}
