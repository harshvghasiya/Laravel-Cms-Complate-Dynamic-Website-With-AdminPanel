<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portfolio extends Model
{
    const apm_id ='12';
    
        public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }
    
    
}
