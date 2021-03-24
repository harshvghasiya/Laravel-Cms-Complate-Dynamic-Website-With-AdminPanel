<?php

namespace App;

use App\module;
use Illuminate\Database\Eloquent\Model;

class cms extends Model
{
  const apm_id ='8';

         public function module()
    {
    	return $this->belongsTo(module::class,'module_id','id');
    }

      public static function getModuleDropdown()
      { 
      	  return module::where('status','Active')->pluck('name','id')->toArray();
      }
       public static function getParentDropdown()
      { 
      	  return cms::where('status','Active')->pluck('name','id')->toArray();
      }

     public function created_email()
    {
        return $this->belongsTo(AdminLogin::class,'created_by','id');
    }


    const CONST_OUR_TOP_WEB_DEVELOPMENT_SOLUTION = '6';
}
