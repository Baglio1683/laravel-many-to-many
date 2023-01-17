<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type_id' => ['nullable','exist:types,id'], 
            'title' => ['required', 'max:150', Rule::unique('projects')->ignore($this->project)], 
            'content' => ['nullable'], 
            'cover_image' => ['nullable' , 'image' , 'max:520']
        ]; 
    }
}
