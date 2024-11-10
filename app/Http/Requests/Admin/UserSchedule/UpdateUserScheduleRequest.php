<?php

namespace App\Http\Requests\Admin\UserSchedule;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserScheduleRequest extends FormRequest
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
            'user_id'               => ['sometimes', 'exists:users,id'],
            'shift_day'             => ['sometimes','string'],
            'start_time'            => ['sometimes'],
            'end_time'              => ['sometimes'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'user_id'               => $this->user_id,
            'shift_day'             => $this->shift_day,
            'start_time'            => $this->start_time,
            'end_time'              => $this->end_time,
        ]);
    }
}
