<?php

namespace App\Http\Requests\Admin\WaitingReservation;

use Illuminate\Foundation\Http\FormRequest;

class StoreWaitingReservationRequest extends FormRequest
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
            'patient_id'            => ['required', 'integer', 'exists:patients,id'],
            'doctor_id'             => ['required', 'integer', 'exists:doctors,id'],
            'room_id'               => ['required', 'integer', 'exists:rooms,id'],
            'reservation_time'      => ['required', 'date'],
            'status'                => ['required', 'string', 'in:waiting,canceled,done'],
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
            'patient_id.required'           => 'Patient is required',
            'patient_id.integer'            => 'Patient must be an integer',
            'patient_id.exists'             => 'Patient does not exist',
            'doctor_id.required'            => 'Doctor is required',
            'doctor_id.integer'             => 'Doctor must be an integer',
            'doctor_id.exists'              => 'Doctor does not exist',
            'room_id.required'              => 'Room is required',
            'room_id.integer'               => 'Room must be an integer',
            'room_id.exists'                => 'Room does not exist',
            'reservation_time.required'     => 'Reservation Time is required',
            'reservation_time.date'         => 'Reservation Time must be a date',
            'status.required'               => 'Status is required',
            'status.string'                 => 'Status must be a string',
            'status.in'                     => 'Status must be waiting, canceled or done',
        ];
    }
}
