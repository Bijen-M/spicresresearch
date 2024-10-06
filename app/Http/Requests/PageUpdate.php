<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageUpdate extends FormRequest
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
            'slug' => 'required|unique:pages,slug,'. request()->segment(3),
            'image' => 'image|mimes:jpeg,png,jpg,svg|dimensions:min_width=500,min_height=250,max_width=800,max_height=400',
        ];
    }
    
}
