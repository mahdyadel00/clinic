<?php

namespace App\Http\Requests\Admin\DoctorScheduleShift;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorScheduleRequest extends FormRequest
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
            'doctor_id'         => ['sometimes', 'integer', 'exists:doctors,id'],
            'shift_day'         => ['sometimes', 'string'],
            'start_time'        => ['sometimes'],
            'end_time'          => ['sometimes', 'after:start_time'],
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
            'doctor_id.required'    => 'The doctor field is required.',
            'doctor_id.integer'     => 'The doctor field must be an integer.',
            'doctor_id.exists'      => 'The selected doctor is invalid.',
            'shift_day.required'    => 'The shift day field is required.',
            'shift_day.integer'     => 'The shift day field must be an integer.',
            'shift_day.min'         => 'The shift day field must be at least 0.',
            'shift_day.max'         => 'The shift day field may not be greater than 6.',
            'start_time.required'   => 'The start time field is required.',
            'start_time.date_format'=> 'The start time does not match the format H:i.',
            'end_time.required'     => 'The end time field is required.',
            'end_time.date_format'  => 'The end time does not match the format H:i.',
            'end_time.after'        => 'The end time must be a date after start time.',
        ];
    }
}
