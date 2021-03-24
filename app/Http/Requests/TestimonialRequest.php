<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            'name.required' => "Please Add  Name.",
            'name.check_testimonial_already_exit'=>'This Name Already Exist',
            'about.required' => "Please Add  about.",
            'role.required' => "Please Add  role.",
            'image.required' => "Image Not Be Null.",
            'image.mimes' => "Image Type Is Invalid.",
            
            
            

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
            'name'=>'required|CheckTestimonialAlreadyExit',
            'role'=>'required',
            'about'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png'
        ];
    }
}
