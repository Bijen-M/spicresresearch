<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioUpdate extends FormRequest
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
            'slug' => 'required|unique:portfolios,slug,'. request()->segment(3),
            'image.*' => 'image|mimes:jpeg,png,jpg|max:1024', //|dimensions:min_width=700,min_height=500,max_width=1000,max_height=800
//            'department_id' => 'required',
        ];
    }
    
    public function messages() {
        return [
           'image.*.image' => 'The file must be an image.',
           'image.*.mimes' => 'The file must be a file of type: jpeg, png, jpg.',
           'image.*.max' => 'The file may not be greater than 1 MB.',
        ];
    }
    
}
