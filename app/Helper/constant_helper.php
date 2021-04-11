<?php

// Constant Id
const services_module_id=5;
const our_top_web_solution_module_id=6;
const about_module_id=10;
const header_module_id=4;


 function flashMessage($type,$message)
	{
	 	\Session::flash($type,$message);
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

 function SocialMedia_Image_Path()
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

function Auther_Setting_Image_Path()
{
  return 'public/setting/authorimage';
}
function Favicon_Setting_Image_Path()
{
  return 'public/setting/faviconimage';
}

function Logo_Setting_Image_Path()
{
  return 'public/setting/logoimage';
}

function No_Image_Url()
{
  return url('public/storage/noimage.png');
}

// Banner Front Show Path And Url

function Banner_Image_Check_Exist_Path()
{
  return 'public/storage/bannerimage';
}

function Banner_Image_Upload_Url()
{
  return url('public/storage/bannerimage');
}

// Cms Front Show Path And Url

function Cms_Image_Exist()
{
  return 'public/storage/cmsimage';
}

function Cms_Image_Url()
{
  return url('public/storage/cmsimage');
}

// PortFolio Front Show Path And Url

function Portfolio_Image_Exist()
{
   return 'public/storage/portfolioimage';
}

function Portfolio_Image_Url()
{
  return url('public/storage/portfolioimage');
}

function Testimonial_Image_Exist()
{
  return 'public/storage/testimonialimage';
}

function Testimonial_Image_Url()
{
  return url('public/storage/testimonialimage');
}

function BLog_Image_Exist()
{
  return 'public/storage/blogimage';
}

function Blog_Image_Url()
{
  return url('public/storage/blogimage');
}

function Social_Media_Image_Check_Exist_Path()
{
  return 'public/storage/socialmediaicon';
}

function Social_Media_Image_Upload_Url()
{
  return url('public/storage/socialmediaicon');
}

function Admin_Login_Image_Check_Exist_Path()
{
  return 'public/storage/userimage';
}

function Admin_Login_Image_Url()
{
  return url('public/storage/userimage');
}

function Author_Setting_Image_Exist()
{
  return 'public/storage/setting/authorimage';
}

function Author_Setting_Image_Url()
{
  return url('public/storage/setting/authorimage');
}

function Logo_Setting_Image_Exist()
{
  return 'public/storage/setting/logoimage';
}

function Logo_Setting_Image_Url()
{
  return url('public/storage/setting/logoimage');
}

function Favicon_Setting_Image_Exist()
{
  return 'public/storage/setting/faviconimage';
}

function Favicon_Setting_Image_Url()
{
  return url('public/storage/setting/faviconimage');
}
	 
?>