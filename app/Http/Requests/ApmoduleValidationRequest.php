<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ApmoduleValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function messages()
    {
        return [
            'name.required'=> 'Name not be null.',
            'name.check_admin_panle_module_upd_already_exit' => "This ModuleName NameIs Taken.",
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $input=$request->all();
        $id= !empty($input['id']) ? $input['id'] : "";

        return [
            'name'=>'required|CheckAdminPanleModuleUpdAlreadyExit:'.$id.'',
        ];
    }
}
