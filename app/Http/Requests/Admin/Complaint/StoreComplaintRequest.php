<?php

namespace App\Http\Requests\Admin\Complaint;

use Illuminate\Foundation\Http\FormRequest;

class StoreComplaintRequest extends FormRequest
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
            'patient_id'        => ['required', 'exists:patients,id'],
            'doctor_id'         => ['required', 'exists:doctors,id'],
            'complaint'         => ['required', 'string'],
            'status'            => ['required', 'in:new,in_progress,closed'],
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
            'patient_id.required'       => 'Please select a patient',
            'patient_id.exists'         => 'Invalid patient',
            'doctor_id.required'        => 'Please select a doctor',
            'doctor_id.exists'          => 'Invalid doctor',
            'complaint.required'        => 'Please enter complaint',
            'complaint.string'          => 'Complaint must be a string',
            'status.required'           => 'Please select status',
            'status.in'                 => 'Invalid status',
        ];
    }
}
