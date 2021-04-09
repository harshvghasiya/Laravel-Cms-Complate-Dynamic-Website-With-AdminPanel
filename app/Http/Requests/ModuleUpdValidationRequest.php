<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ModuleUpdValidationRequest extends FormRequest
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
            'name.check_module_name_upd_already_exit' => "This ModuleName Name Is Already In Use.",
            'slug.required' => "Please Add ModuleSlug.",
            'slug.check_module_slug_upd_already_exit' => "This SlugName Name Is Already In Use.",
            

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
            'name' => 'required|CheckModuleNameUpdAlreadyExit:'.$id.'',
            'slug' =>'required|CheckModuleSlugUpdAlreadyExit:'.$id.''
                        

        ];

    }
}
