<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
        $rules = [
            'event_name'=>['required', 'string'],
            'description'=> ['required', 'string'],
            'event_date'=> ['nullable', 'date_format:d/m/Y'],
            'event_time'=> ['nullable', 'date_format:H:i'],
        ];

        if($this->isMethod('post')){
            $rules['photo_path']= ['required', 'string'];
        } else{
            $rules['photo_path']= ['nullable', 'string'];
        }
        
        return $rules;
    }
}
