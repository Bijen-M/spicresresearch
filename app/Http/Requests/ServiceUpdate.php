<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdate extends FormRequest
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
            'title' => 'required',
            'slug' => 'required|unique:services,slug,'. request()->segment(3),
            'department_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=700,min_height=500,max_width=1000,max_height=800',
        ];
    }
    
    public function messages() {
        return [
            'department_id.required' => 'The department field is required.'
        ];
    }
    
}
