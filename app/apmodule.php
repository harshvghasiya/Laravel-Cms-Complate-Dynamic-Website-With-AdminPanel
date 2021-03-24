<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apmodule extends Model
{

	public function apm_user_right()
	{
		return $this->hasMany(\App\Apm_user::class,'apm_id','id'); 
	}
	public function edit_del_access()
		{
			return $this->hasMany(\App\Apdeledit::class,'module_id','id'); 
		}

     public static function getModuleDropdown()
    {
       return self::with(['edit_del_access'])->where('status','Active')->get(); 
    }
    public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }
    const apm_id ='27';

}
