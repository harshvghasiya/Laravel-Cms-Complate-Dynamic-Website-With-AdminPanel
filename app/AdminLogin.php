<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AdminLogin extends Authenticatable
{
    use Notifiable;
    
    const apm_id ='17';

     protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember',
    ];


     public function banner_create()
    {
    	return $this->hasmany(banner::class,'created_by','id');
    } 

    public function user_apm_right()
    {
        return $this->hasMany(\App\Apm_user::class,'user_id','id'); 
    }

     public function auth_rel()
    {
        return $this->hasmany(userfollow::class,'auth_id','id');
    }

        public function user_rel()
    {
        return $this->hasmany(userfollow::class,'user_id','id');
    }

     public static function getCreateBy($id)
    {
      $x=AdminLogin::find($id);
       if ($x != null) {
        return $x->email;
       }

     
    }
}
