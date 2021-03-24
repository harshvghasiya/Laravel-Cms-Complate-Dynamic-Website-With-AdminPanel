<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apdeledit extends Model
{
      public function del_edit_access()
	{
		return $this->belongsTo(\App\apmodule::class,'module_id','id'); 
	}
}
