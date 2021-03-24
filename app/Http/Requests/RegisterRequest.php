<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return[
            'name.required'=>'Name Is Required',
            'email.check_user_already_exit'=>'Account Already Exist ',
            'email.required'=>'EMail Is Required',
            'email.email'=>'Check Your Email',
            'password.required'=>'Password IS Required'
            
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
            'email'=>'required|email|CheckUserAlreadyExit',
            'status'=>'required',
            'password'=>'required|min:3'
        ];
    }
}
