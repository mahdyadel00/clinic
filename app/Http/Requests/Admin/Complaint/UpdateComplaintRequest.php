<?php

namespace App\Http\Requests\Admin\Complaint;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComplaintRequest extends FormRequest
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
            'patient_id'        => ['sometimes', 'exists:patients,id'],
            'doctor_id'         => ['sometimes', 'exists:doctors,id'],
            'complaint'         => ['sometimes', 'string'],
            'status'            => ['sometimes', 'in:new,in_progress,closed'],
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
            'status.in'         => 'The status must be one of the following types: new, in_progress, closed.',
        ];
    }
}
