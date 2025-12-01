<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        if($this->isMethod('put')){
            $rules['photo_path'] = 
            [
                'nullable', 'file', 'image', 'max:1024', 
                function($attribute, $value, $fail){
                    $image = getimagesize($value);
                    if($image[0]<520){
                        $fail('The photo width must be at least 520px');
                    }
                     if ($image[1] < 360) {
                        $fail('The photo height must be at least 360px.');
                    }
                }
            ];
        }else{
            $rules['photo_path'] = 
            [
                'required', 'file', 'image', 'max:1024',  
                function($attribute, $value, $fail){
                    $image = getimagesize($value);
                    if($image[0]<520){
                        $fail('The photo width must be at least 520px');
                    }
                     if ($image[1] < 360) {
                        $fail('The photo height must be at least 360px.');
                    }
                }
            ];
        }
        
        return $rules;
    }
}
