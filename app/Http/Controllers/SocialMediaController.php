<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialmediaValidationRequest;
use App\SocialMedia;
use Illuminate\Http\Request;
              


class SocialMediaController extends Controller
{
    function __construct()
    { 
        $this->Model= new SocialMedia;
        $apm_id=SocialMedia::apm_id;
        $this->middleware('access:'.$apm_id.''); 
    }
   
    public function create()
    {
       return $this->Model->createSocialMedia();
    }

    public function store_upd(SocialmediaValidationRequest $request)
    {
      return $this->Model->saveSocialMedia($request);
    }

    public function some_datable()
    {
      return $this->Model->datableSocialMedia();
    }

    public function show(SocialMedia $SocialMedia)
    {
        return view('admin.social_media.socialmedialist');
    }

    public function edit(SocialMedia $SocialMedia,$id)
    { 
       return $this->Model->editSocialMedia($id);

    }

     public function status_some(Request $request)
    {
      return $this->Model->statusSocialMedia($request);
    }
     public function status_all(Request $request)
    {
        return $this->Model->statusAllSocialMedia($request);    
    }

    public function destroy(SocialMedia $SocialMedia,Request $request)
    {
       return $this->Model->deleteSocialMedia($request);
    }

   public function del_all(SocialMedia $SocialMedia,Request $request)
    {
        return $this->Model->deleteAllSocialMedia($request);
    }
}
