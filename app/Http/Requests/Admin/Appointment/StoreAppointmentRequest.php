<?php

namespace App\Http\Requests\Admin\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'doctor_id'        => ['required', 'integer', 'exists:doctors,id'],
            'patient_id'       => ['required', 'integer', 'exists:patients,id'],
            'appointment_date' => ['required', 'date'],
            'description'      => ['nullable', 'string'],
            'status'           => ['required', 'in:pending,approved,rejected'],
        ];
    }

    /**
     * messages
     *
        * @return array<string, string>
        */
    public function messages(): array
    {
        return [
            'doctor_id.required'        => 'Doctor is required',
            'doctor_id.integer'         => 'Doctor must be an integer',
            'doctor_id.exists'          => 'Doctor not found',
            'patient_id.required'       => 'Patient is required',
            'patient_id.integer'        => 'Patient must be an integer',
            'patient_id.exists'         => 'Patient not found',
            'appointment_date.required' => 'Appointment date is required',
            'appointment_date.date'     => 'Appointment date must be a date',
            'description.string'        => 'Description must be a string',
            'status.required'           => 'Status is required',
            'status.in'                 => 'Status must be pending, approved or rejected',
        ];
    }
}
