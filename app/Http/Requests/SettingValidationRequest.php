<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SettingValidationRequest extends FormRequest
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
           
            'first_mobile.digits' => "Not Valid First Mobile Number.",
            'second_mobile.digits' => "Not Valid Second Mobile Number.",    
            'first_email.required' => "Please Add Email.",
            'first_email.email' => "Please Add Valid Emailaddress.",
            'second_email.email' => "Please Add Valid Emailaddress.",
            'second_email.required' => "Please Add Email.",
            'author_name.required' => "Please Add Author Name.",
            'web_url.required' => "Please Add weburl.",
            'web_url.url' => "Enter Valid Weburl.",
            'author_decription_sidebar.required' => "Please Add Author Description.",
            'author_decription_footer.required' => "Please Add Author Description.",
            'address.required' => "Please Add Address.",
             
            
            
            

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)

    {
       // dd($request->input('first_mobile'));
        
          return [
            'first_mobile' => 'digits:10',
           
            'second_mobile' => 'digits:10',
            'first_email' => 'required|email',
            'second_email' => 'required|email',
            'web_url' => 'required|url',
            'author_name' => 'required',
            'author_decription_sidebar' => 'required',
            'author_decription_footer' => 'required',
            'address' => 'required',
          
              

        ];

    }
}
