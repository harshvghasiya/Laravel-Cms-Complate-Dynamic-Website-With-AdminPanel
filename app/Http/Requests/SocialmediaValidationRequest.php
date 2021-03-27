<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SocialmediaValidationRequest extends FormRequest
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
            'title.required' => "Please Add Title.",
             'url.required'=>'Please Add URL',
             'url.url'=>'Enter Valid URL',
              'icon.mimes'=>'Icon Mustbe a Jpeg,Png,Jpg'   
            

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
            'url'=>'required|url',
            'icon'=>'mimes:jpeg,png,jpg'
            

        ];

    }
}
