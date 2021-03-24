<?php

namespace App;

use App\AdminLogin;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
     public function created_email()
    {
    	return $this->belongsTo(AdminLogin::class,'created_by','id');
    }
    

    const apm_id ='4';

   
}
