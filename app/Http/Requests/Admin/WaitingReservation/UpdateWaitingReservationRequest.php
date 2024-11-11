<?php

namespace App\Http\Requests\Admin\WaitingReservation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWaitingReservationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'patient_id'                => ['sometimes', 'integer', 'exists:patients,id'],
            'room_id'                   => ['sometimes', 'integer', 'exists:rooms,id'],
            'doctor_id'                 => ['sometimes', 'integer', 'exists:doctors,id'],
            'reservation_time'          => ['sometimes', 'date'],
            'status'                    => ['sometimes', 'string', 'in:waiting,canceled,done'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'patient_id.exists'         => 'The selected patient is invalid.',
            'room_id.exists'            => 'The selected room is invalid.',
            'doctor_id.exists'          => 'The selected doctor is invalid.',
            'reservation_time.date'     => 'The reservation time must be a date.',
            'status.in'                 => 'The status must be waiting, canceled, or done.',
        ];
    }
}
