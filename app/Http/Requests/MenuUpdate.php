<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuUpdate extends FormRequest
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
            'title' => 'required_if:type,|required_with:type',
            'slug' => 'required_if:type,|required_with:type',
        ];
    }
    
    public function messages() {
        return [
            'title.required_if' => 'The title field is required.',
            'slug.required_if' => 'The slug field is required.',
            'title.required_with' => 'The title field is required.',
            'slug.required_with' => 'The slug field is required.',
        ];
    }
    
}
