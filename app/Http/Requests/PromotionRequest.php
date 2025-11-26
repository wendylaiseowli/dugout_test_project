<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromotionRequest extends FormRequest
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
        return [
            'name'=> ['required', 'string'],
            'photo_path'=> ['required', 'string'],
            'promotion_startDate'=> ['required', 'date_format:d/m/Y'],
            'promotion_endDate'=>['required', 'date_format:d/m/Y'],
            'description'=>['required', 'string'],
        ];
    }
}
