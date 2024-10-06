<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioCreate extends FormRequest
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
            'slug' => 'required|unique:portfolios',
            'image' => 'required', //|dimensions:min_width=700,min_height=500,max_width=1000,max_height=800
            'image.*' => 'image|mimes:jpeg,png,jpg|max:1024',
//            'client' => 'required',
//            'status' => 'required',
            'department_id' => 'required',
        ];
    }
    
    public function messages() {
        return [
            'department_id.required' => 'The department field is required.',
            'image.*.image' => 'The file must be an image.',
            'image.*.mimes' => 'The file must be a file of type: jpeg, png, jpg.',
            'image.*.max' => 'The file may not be greater than 1 MB.',
        ];
    }
    
}
