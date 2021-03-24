<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class social_media extends Model
{
    const apm_id ='15';

       public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }
   
}
