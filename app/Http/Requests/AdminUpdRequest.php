<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminUpdRequest extends FormRequest
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
          'name.required'=>'Name Is Required',
          'email.email'=>'Enter Valid Email',
          'email.check_admin_upd_already_exit'=>'Email Alredy Exist'

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
        // dd($input);
        $id= !empty($input['id']) ? $input['id'] : "";

        return [
            'name'=>'required',
            'email'=>'email|CheckAdminUpdAlreadyExit:'.$id.''
        ];
    }
}
