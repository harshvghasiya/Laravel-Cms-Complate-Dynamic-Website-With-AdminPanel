<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QnaRequest extends FormRequest
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
            'question.required'=>'Question Field Is Required',
            'answer.required'=>'Answer Field Is Required',

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
            'question'=>'required',
            'answer'=>'required',
            'status'=>'required'
        ];
    }
}
