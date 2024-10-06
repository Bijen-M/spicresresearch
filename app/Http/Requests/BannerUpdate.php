<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerUpdate extends FormRequest
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
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:1024|dimensions:min_width=1000,min_height=800,max_width=1800,max_height=1600',
            'url_text' => 'required_with:url',
        ];
    }
    
    public function messages() {
        return [
            'department_id.required' => 'The department field is required.',
            'url_text.required_with' => 'The link text field is required when link is present.',
        ];
    }
    
}
