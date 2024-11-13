<?php

namespace App\Http\Requests\Admin\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
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
            'patient_id'        => ['sometimes', 'integer', 'exists:patients,id'],
            'doctor_id'         => ['sometimes', 'integer', 'exists:doctors,id'],
            'appointment_date'  => ['sometimes', 'date'],
            'description'       => ['sometimes', 'string'],
            'status'            => ['sometimes', 'string'],
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
            'patient_id.exists' => 'The selected patient is invalid.',
            'doctor_id.exists'  => 'The selected doctor is invalid.',
        ];
    }
}
