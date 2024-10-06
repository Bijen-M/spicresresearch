<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsLetterCreate extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:news_letters',
            'description' => 'required',
            'image.*' => 'mimes:jpeg,png,jpg,gif,svg',
        ];
    }
    
    public function messages() {
        return [
            'image.*.mimes' => 'The files must be a file of type: jpeg, png, jpg, gif, svg.',
        ];
    }
    
}
