<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ModuleValidationRequest extends FormRequest
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
            'name.required' => "Please Add ModuleName.",
            'name.check_module_already_exit' => "Enter Unquie ModuleName.",
            'slug.required' => "Please Add ModuleSlug.",
             'slug.check_module_already_exit' => "Enter Unquie SlugName.",
             
            

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)

    {

          return [
            'name' => 'required|CheckModuleAlreadyExit',
            'slug' =>'required|CheckModuleAlreadyExit'
                        

        ];

    }
}
