<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ReservationRequest extends FormRequest
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
            'reservation_name'=> ['required','string', "regex:/^[\p{L}\s\-.']+$/u"],
            'reservation_date'=> ['required','date_format:d/m/Y','after_or_equal:today'],
            'reservation_time'=> ['required', 'date_format:H:i'],
            'number_of_people'=> ['required', 'integer'],
            'phone_number'=> ['required', 'string', "regex:/^[0-9][0-9]{7,14}$/"],
            'email'=> ['required', 'email:rfc,dns'],
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->withFragment('reservationSection')
        );
    }
}
