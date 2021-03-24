<?php
namespace App\Validator;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;
class CustomeValidator extends Validator
{
/**
* [validatecheckTagTitleExit To check tag name alredy used or not]
* @param  [type] $attribute  [description]
* @param  [type] $value      [description]
* @param  [type] $parameters [description]
* @return [type]             [description]
*/


public function validateCheckModuleAlreadyExit($attribute, $value, $parameters)
{

    $module = \App\module::where('name',$value)->first();

    if ($module == null) {
        
        return true;

    }else{

        return false;
    }


    
}

public function validateCheckCatagoryAlreadyExit($attribute, $value, $parameters)
{

    $catagory = \App\Catagory::where('catagory',$value)->first();

    if ($catagory == null) {
        
        return true;

    }else{

        return false;
    }


    
}
public function validateCheckTestimonialAlreadyExit($attribute, $value, $parameters)
{

    $testimonial=\App\testimonial::where('name',$value)->first();
    if ($testimonial == null) {
        return true;    
    }else{
       return false;
    }

    


    
}

public function validateCheckUserAlreadyExit($attribute, $value, $parameters)
{

    $userregister=\App\AdminLogin::where('email',$value)->first();
    if ($userregister == null) {
        return true;    
    }else{
       return false;
    }

    
    
}

public function validateCheckAdminUpdAlreadyExit($attribute, $value, $parameters)
{

    $userregister=\App\AdminLogin::where('email',$value)->where('id',$parameters[0])->first();
    if ($userregister != null) {
        $data=\App\AdminLogin::where('email',$value)->first();
        if($data ==null){
            return true;
        }else{
            return false;
        }
    }else{
       return true;
    }
    
}




public function validateCheckModuleUpdAlreadyExit($attribute, $value, $parameters)
{
   

    $module = \App\module::where('name',$value)->where('id',$parameters[0])->first();

    if ($module == null) {
        
        $sql=\App\module::where('name',$value)->first();
        if ($sql != null) {
        	return false;
        }else{
            return true;
         }
    }else{

        return true;
    }


    
}


public function validateCheckTagUpdAlreadyExit($attribute, $value, $parameters)
{

    $blog_tag = \App\Tag::where('tag',$value)->where('id',$parameters[0])->first();
   // dd($blog_tag);
    

    if ($blog_tag == null) {
        
        $sql=\App\Tag::where('tag',$value)->first();
        if ($sql != null) {
            return false;
        }else{
            return true;
         }
    }else{

        return true;
    }


    
}

public function validateCheckTestUpdAlreadyExit($attribute, $value, $parameters)
{
  
    $testimonial = \App\testimonial::where('name',$value)->where('id',$parameters[0])->first();

    if ($testimonial == null) {
        
        $sql=\App\testimonial::where('name',$value)->first();
        if ($sql != null) {
            return false;
        }else{
            return true;
         }
    }else{

        return true;
    }


    
}

public function validateCheckCatagoryUpdAlreadyExit($attribute, $value, $parameters)
{

    $catagory = \App\catagory::where('catagory',$value)->where('id',$parameters[0])->first();

    if ($catagory == null) {
        
        $sql=\App\catagory::where('catagory',$value)->first();
        if ($sql != null) {
            return false;
        }else{
            return true;
         }
    }else{

        return true;
    }


    
}



}
?>
