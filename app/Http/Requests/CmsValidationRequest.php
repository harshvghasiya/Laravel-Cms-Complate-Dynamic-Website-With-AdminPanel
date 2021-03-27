<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CmsValidationRequest extends FormRequest
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
            'secondary_title.required' => "Please Add Blog Secondary Title.",
            'display_on_header.required' => "Check Yes Or NO",
            'display_on_footer.required' => "Check Yes Or NO",
            'status.required' => "Check Yes Or NO",
            'seo_title.required' => "Please Add SEO Title.",
            'seo_keyword.required' => "Please Add SEO Keyword.",
            // 'seo_description.required' => "Please Add SEO Description.",
            // 'long_description.required' => "Please Add Long Description.",
            // 'short_description.required' => "Please Add Short Description.",
            
            'image.mimes' => "Image Is MustBe Jpeg,Jpg,Png.",
            'module.required' => "Select Module Catagory",
            
            
            

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
            'display_on_footer' => 'required',
            'display_on_header' => 'required',
            'status' => 'required',
            // 'long_description' => 'required',
            // 'short_description' => 'required',
            'seo_title' => 'required',
            // 'seo_description' => 'required',
            'seo_keyword' => 'required',
            'module' => 'required',

            'secondary_title' => 'required', 
           
            'image'=>'mimes:jpeg,jpg,png',
        

        ];

    }
}
