<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testimonial extends Model
{
    const apm_id ='28';
     public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }
    
    
}
