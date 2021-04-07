<?php

namespace App\Http\Controllers;

use App\Apdeledit;
use App\Http\Requests\BannerValidationRequest;
use App\banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BannerController extends Controller
{
      function __construct()
    { 
        $this->Model = new banner;
        $apm_id=banner::apm_id;
        $this->middleware('access:'.$apm_id.'');      
    }
   
    public function create()
    {
       return $this->Model->createBanner();
    }

    public function store_upd(BannerValidationRequest $request)
    {
       return $this->Model->saveBanner($request);
    }

    public function show(banner $banner)
    {
        return view('admin.banner.bannerlist');
    }

    public function banner_datable()
    {
          
        return $this->Model->BannerDatable();
    }

    public function edit(banner $banner,$id)
    {
        return $this->Model->editBanner($id);
    }


    public function status_banner(Request $request)
    {
      return $this->Model->status($request);
    }

    public function status_all(Request $request)
    {
       return $this->Model->status_all($request);
    }


    public function destroy(banner $banner,Request $request)
    {
       
        return  $this->Model->deleteBanner($request);
    }

     public function del_all(banner $banner,Request $request)
    {
       return $this->Model->delallBanner($request);
    }
}
