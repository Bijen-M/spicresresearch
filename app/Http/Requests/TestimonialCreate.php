<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialCreate extends FormRequest
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
            'description' => 'required',
            'by' => 'required',
            'department_id' => 'required',
            'image' => 'dimensions:ratio=1/1,max_width=100,max_height=100',
        ];
    }
    
    public function messages() {
        return [
            'by.required' => 'The name field is required.',
            'department_id.required' => 'The department field is required.',
        ];
    }
    
}
