<?php

 function flashMessage($type,$message)
	 {
	 	\Session::flash($type,$message);
	 }

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

 function Allacceess($user_id,$slug)
{ 
   $accessuser=\App\Accessuser::where('user_id',$user_id)->pluck('access_slug')->toArray();
   // dd($accessuser);
   if ($accessuser != null) {
          if (in_array($slug,$accessuser)) {
             return true;
          }else{
            // flashMessage('danger','Access Denied');
            return false;
          }
       
   }

   
}

const services_module_id=5;
const our_top_web_solution_module_id=6;
const about_module_id=10;
	 
?>