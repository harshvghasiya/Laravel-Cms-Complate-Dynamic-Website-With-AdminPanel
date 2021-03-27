<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class BannerValidationRequest extends FormRequest
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
            'name.required' => "Please Add Blog Name.",
            'image.mimes' => "Image Type Is Invalid.",
            'url.url'=>'Not Valid URL'
            
            

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
            'name' => 'required',
            'url' =>  'url',
            'image'=>'mimes:jpeg,jpg,png',

        ];

    }
}
