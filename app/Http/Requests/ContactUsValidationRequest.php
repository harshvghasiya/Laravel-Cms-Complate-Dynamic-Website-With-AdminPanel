<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsValidationRequest extends FormRequest
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
      return  [
        'name.required'=>'Name Is Empty',
        'email.required'=>'Email Is Empty',
        'subject.required'=>'Subject Is Empty',
        'message.required'=>'Message Is Empty',
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
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ];
    }
}
