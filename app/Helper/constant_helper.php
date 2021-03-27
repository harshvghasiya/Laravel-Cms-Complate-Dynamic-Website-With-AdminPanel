<?php

// Constant Id
const services_module_id=5;
const our_top_web_solution_module_id=6;
const about_module_id=10;


 function flashMessage($type,$message)
	 {
	 	\Session::flash($type,$message);
	 }


// For Admin Home View Access
function Acceess($user_id,$apm_id)
{ 
   $apm_user=\App\apm_user::where('user_id',$user_id)->pluck('apm_id')->toArray();

   if ($apm_user != null) {
   	 	 if (in_array($apm_id,$apm_user)) {
   	 	 	 return true;
   	 	 }else{
   	 	 	return false;
   	 	 } 
   }	
}

// For All Access (Edit,Delte,Update Etc)
 function Allacceess($user_id,$slug)
{ 
   $accessuser=\App\Accessuser::where('user_id',$user_id)->pluck('access_slug')->toArray();
 
   if ($accessuser != null) {
          if (in_array($slug,$accessuser)) {
             return true;
          }else{
            flashMessage('danger','Access Denied');
            return false;
          }       
   }  
}

// Image Upload

function UploadImage($image,$uploadPath)
{

   $exe=$image->extension();
   $image_name=time().'.'.$exe;
   $image->storeAs($uploadPath,$image_name);
   return $image_name;      
}

function Blog_Image_Path()
{
  return 'public/blogimage';
}

function Banner_Image_Path()
{
  return 'public/bannerimage';
}

function Cms_Image_Path()
{
  return 'public/cmsimage';
}

 function Social_Media_Image_Path()
{
   return 'public/socialmediaicon';
}

 function Portfolio_Image_Path()
{
  return 'public/portfolioimage';
}

function Testimonial_Image_Path()
{
  return 'public/testimonialimage';
}

function Admin_Image_Path()
{
  return 'public/userimage';
}

function Auther_Image_Path()
{
  return 'public/authorimage';
}
	 
?>