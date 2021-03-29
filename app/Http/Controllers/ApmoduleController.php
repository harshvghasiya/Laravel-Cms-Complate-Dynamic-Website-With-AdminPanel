<?php

namespace App\Http\Controllers;

use App\Apm_user;
use App\apmodule;
use Illuminate\Http\Request;
use App\Http\Requests\ApmoduleValidationRequest;

class ApmoduleController extends Controller
{
    function __construct()
    { 
        $this->Model=new apmodule;
        $apm_id=apmodule::apm_id;
        $this->middleware('access:'.$apm_id.''); 
    }
  
    public function create()
    {
       return $this->Model->createApmodule();
    }

    public function store_update(ApmoduleValidationRequest $request)
    {
        return $this->Model->saveApmodule($request);
    }

    public function show(apmodule $apmodule)
    {
        return view('admin.AdminPanleModule.apmodulelist');
    }

     public function apmodule_datable()
    {
        return $this->Model->datableApmodule();
    }
   
    public function edit(apmodule $apmodule,Request $request,$id)
    {
        return $this->Model->editApmodule($id);
    }

    public function status(Request $request)
    {
        return $this->Model->statusApmodule($request);
    }
    public function status_all(Request $request)
    {
       return $this->Model->statusAllApmodule($request);
    }

    public function destroy(apmodule $apmodule,Request $request)
    {
       return $this->Model->deleteApmodule($request);
    }

     public function del_all(Request $request)
    {
        return $this->Model->deleteAllApmodule($request);
    }
}
