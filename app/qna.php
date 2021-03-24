<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qna extends Model
{
    const apm_id ='29';
    public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }
   
}
