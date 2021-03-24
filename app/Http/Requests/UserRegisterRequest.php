<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'email.required'=>'Email Not Be Null',
            'password.required'=>'Password Is Fillable',
            'name.required'=>'Username Is Required',
            'emil.email'=>'Email Not Valid',
            'email.unique'=>'Account ALready Exist'

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
            'email'=>'required|email|unique:users',
            'password'=>'required|min:2',
            'name'=>'required|min:2'
        ];
    }
}
