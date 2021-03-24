<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
       return [ 'name.required'=>'Name Field Cant Be Empty',
        'url.url'=>'Enter Valid URL',
        'status.required'=>'Status is not valid'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'url'=>'url',
            'status'=>'required',

        ];
    }
}
