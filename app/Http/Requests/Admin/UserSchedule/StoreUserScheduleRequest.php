<?php

namespace App\Http\Requests\Admin\UserSchedule;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserScheduleRequest extends FormRequest
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
            'user_id'           => ['required', 'integer' , 'exists:users,id'],
            'shift_day'         => ['required', 'string'],
            'start_time'        => ['required', 'date_format:H:i'],
            'end_time'          => ['required', 'date_format:H:i'],
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
            'user_id.required'          => 'User is required',
            'user_id.integer'           => 'User must be an integer',
            'user_id.exists'            => 'User does not exist',
            'shift_day.required'        => 'Shift day is required',
            'shift_day.string'          => 'Shift day must be a string',
            'start_time.required'       => 'Start time is required',
            'start_time.date_format'    => 'Start time must be in H:i format',
            'end_time.required'         => 'End time is required',
            'end_time.date_format'      => 'End time must be in H:i format',
        ];
    }
}
