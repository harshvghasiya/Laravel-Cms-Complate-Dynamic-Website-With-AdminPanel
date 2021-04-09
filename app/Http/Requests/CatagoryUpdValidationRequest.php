<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CatagoryUpdValidationRequest extends FormRequest
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
            'catagory.required' => "Please Add Catagory.",
            'catagory.check_catagory_upd_already_exit' => "This Catagory Already Exist.",        
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
            'catagory' => 'required|CheckCatagoryUpdAlreadyExit:'.$id.'',
            

        ];

    }
}
