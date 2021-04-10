<?php

namespace App\Http\Controllers;


use App\Http\Requests\CmsValidationRequest;
use App\cms;
use Illuminate\Http\Request;


class CmsController extends Controller
{
      function __construct()
    { 
       $this->Model=new cms;
        $apm_id=cms::apm_id;
        $this->middleware('access:'.$apm_id.'')->except('cms_content'); 
    }
  
    public function create()
    {
      return $this->Model->createCms();
    }

    public function store_update(CmsValidationRequest $request)
    {
       return $this->Model->storeCms($request);
    }

    public function show(cms $cms)
    {
        return view('admin.cms.cmslist');
    }

    public function cms_datable()
    { 
       return $this->Model->databaleCms();  
    }

    public function edit(cms $cms,$id)
    { 
      return $this->Model->editCms($id);
    }

    public function status_cms(Request $request)
    {
       return $this->Model->statusCms($request);
    }

    public function status_all(Request $request)
    {
        return $this->Model->statusAllCms($request);
    }

    public function destroy(cms $cms,Request $request)
    {
     return $this->Model->deleteCms($request);

    }

    public function del_all(Request $request)
    {
      return $this->Model->deleteAllCms($request);
    } 

    public function cms_content($cms)
    {
      return $this->Model->getCmsPageContent($cms);
    }
    
}
