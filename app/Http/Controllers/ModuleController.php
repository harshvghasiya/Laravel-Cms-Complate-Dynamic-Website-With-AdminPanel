<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleUpdValidationRequest;
use App\Http\Requests\ModuleValidationRequest;
use App\module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
      function __construct()
    { 
        $this->Model=new module;
        $apm_id=module::apm_id;
        $this->middleware('access:'.$apm_id.''); 
    }
   
    public function create()
    {
       return $this->Model->createModule();
    }

    public function store(ModuleValidationRequest $request)
    {
       return $this->Model->storeModule($request);
    }

    public function show(module $module)
    {
        return view('admin.module.modulelist');
    }

    public function module_datable()
    {
        return $this->Model->datableModule();
    }
  
    public function edit(module $module,$id)
    {
        return $this->Model->editModule($id);
    }

    public function update(ModuleUpdValidationRequest $request, module $module)
    {
       return $this->Model->updateModule($request);
    }

    public function status_module(Request $request)
    {
       return $this->Model->statusModule($request); 
    }
   public function status_all(Request $request)
    {
       return $this->Model->statusAllModule($request);
    }
    
    public function destroy(Request $request)
    {
       return $this->Model->deleteModule($request);
    }

     public function del_all(module $module,Request $request)
    {
       return $this->Moel->deleteAllModule($request);
    }
}
