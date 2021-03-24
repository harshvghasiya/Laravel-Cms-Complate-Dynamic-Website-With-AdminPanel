<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BlogUpdValidationRequest extends FormRequest
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
            'title.required' => "Please Add Blog Title.",
            'description.required' => "Please Add Blog Description.",
            // 'image.required' => "Image Not Be Null.",
            // 'image.mimes' => "Image Type Is Invalid.",
            
            

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
            'title' => 'required',
            'description'=>'required',
            // 'image'=>'required|mimes:jpeg,jpg,png',

        ];

    }
}
