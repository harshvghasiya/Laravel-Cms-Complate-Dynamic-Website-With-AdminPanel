<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userfollow extends Model
{
        public function user_rel()
    {
        return $this->belongsTo(AdminLogin::class,'user_id','id');
    }  
          public function auth_rel()
    {
        return $this->belongsTo(AdminLogin::class,'auth_id','id');
    }

    public static function getFollower($id,$ids)
    {
    	$x=userfollow::where('auth_id',$id)->where('user_id',$ids)->where('follow_status',1)->get();
    	return $x;
    }
    public static function CountFollower($id)
    {
    	$count=userfollow::where('user_id',$id)->where('follow_status',1)->count();
    	return $count;
    }
        public static function CountFollowing($id)
    {
    	$count=userfollow::where('auth_id',$id)->where('follow_status',1)->count();
    	return $count;
    }

        public static function FollowerList($id)
    {
    	$x=userfollow::with(['user_rel'])->where('user_id',$id)->where('follow_status',1)->get();
    	return $x;
          
    }

}
