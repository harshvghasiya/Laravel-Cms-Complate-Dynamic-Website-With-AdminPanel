<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TagValidationRequest extends FormRequest
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
         'tag.check_tag_upd_already_exit'=>'This Tag Already Apllied In Blog',
         'tag.required'=>'Tag Is Required'
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
        // dd($input);
        $id= !empty($input['id']) ? $input['id'] : "";
        return [
            'tag'=>'CheckTagUpdAlreadyExit:'.$id.'|required'
        ];
    }
}
