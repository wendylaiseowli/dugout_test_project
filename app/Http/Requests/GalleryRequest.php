<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules=  [
            'categoryID'=> ['required', 'numeric'],
        ];

        if($this->isMethod('put')){
            $rules['new_photo_path'] = ['nullable', 'file', 'image', 'max:5120'];
        }else{
            $rules['new_photo_path'] = ['required', 'file', 'image', 'max:5120'];
        }

        return $rules;
    }
}
