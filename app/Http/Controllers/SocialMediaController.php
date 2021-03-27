<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialmediaValidationRequest;
use App\social_media;
use Illuminate\Http\Request;
              


class SocialMediaController extends Controller
{
    function __construct()
    { 
        $this->Model= new social_media;
        $apm_id=social_media::apm_id;
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

    public function show(social_media $social_media)
    {
        return view('admin.social_media.socialmedialist');
    }

    public function edit(social_media $social_media,$id)
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

    public function destroy(social_media $social_media,Request $request)
    {
       return $this->Model->deleteSocialMedia($request);
    }

   public function del_all(social_media $social_media,Request $request)
    {
        return $this->Model->deleteAllSocialMedia($request);
    }
}
