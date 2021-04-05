<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apm_user extends Model
{
    public function apm_user_right()
	{
		return $this->belongsTo(\App\apmodule::class,'apm_id','id'); 
	}

    public function user_apm_right()
	{
		return $this->belongsTo(\App\AdminLogin::class,'user_id','id'); 
	}

	
}
