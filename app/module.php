<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class module extends Model
{
	const apm_id ='10';

     public function cms()
    {
    	return $this->hasMany(cms::class,'module_id','id');
    }

       public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }

}
