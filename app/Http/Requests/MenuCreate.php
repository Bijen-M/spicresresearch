<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuCreate extends FormRequest
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
            'title' => 'required_if:type,|required_if:type,static',
            'slug' => 'required_if:type,|required_if:type,static',
            'type_ids' => 'required_with:type',
        ];
    }
    
    public function messages() {
        return [
            'title.required_if' => 'The title field is required.',
            'slug.required_if' => 'The slug field is required.',
            'type_ids.required_with' => 'The type item field is required.',
        ];
    }
    
}
