<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamUpdate extends FormRequest
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
            'image' => 'image|mimes:jpeg,png,jpg', //|dimensions:ratio=1/1,min_width=300,min_height=300,max_width=500,max_height=500
            'department_id' => 'required',
            'name' => 'required',
            'position' => 'required',
        ];
    }
    
    public function messages() {
        return [
            'department_id.required' => 'The department field is required.'
        ];
    }
}
