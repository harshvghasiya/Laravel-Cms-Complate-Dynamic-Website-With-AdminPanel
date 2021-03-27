<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingValidationRequest;
use App\setting;
use Illuminate\Http\Request;


class SettingController extends Controller
{
      function __construct()
    { 
        $this->Model=new setting;
        $apm_id=setting::apm_id;
        $this->middleware('access:'.$apm_id.''); 
    }
    
    public function create()
    {
        return $this->Model->createSetting();
    }

    public function update(SettingValidationRequest $request, setting $setting)
    {
       return $this->Model->saveSetting($request);
    }

}
