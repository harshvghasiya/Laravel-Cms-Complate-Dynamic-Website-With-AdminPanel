<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TestimonialUpdRequest extends FormRequest
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
            'name.required' => "Please Add Name.",
            'name.check_test_upd_already_exit' => "Please Add Unique Name.",
            'role.required' => "Please Add Role.",
            'about.required' => "Please Add About.",
            'status.required' => "Please Add status.",         
            'image.mimes'=>'Please Select Valid Image'
             
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
            'name' => 'required|CheckTestUpdAlreadyExit:'.$id.'',
            'role' => 'required',
            'about' => 'required',
            'status' => 'required',
            'image'=>'mimes:jpeg,png,jpg'
            

        ];

    }
}
