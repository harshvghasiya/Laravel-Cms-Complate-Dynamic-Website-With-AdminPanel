<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ChangePasswordRequest extends FormRequest
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
          'current_password.change_password'=>'Enter Right Password',
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
        $current_password= !empty($input['current_password']) ? $input['current_password'] : "";

        return [
            'current_password'=>'required|ChangePassword:'.$current_password.'',
            'new_password'=>'required',
        ];
    }
}
