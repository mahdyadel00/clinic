<?php

namespace App\Http\Requests\Admin\Patient;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'user_id'           => ['required', 'exists:users,id'],
            'phone'             => ['required', 'string', 'max:255'],
            'address'           => ['required', 'string', 'max:255'],
            'dob'               => ['required', 'date'],
            'gender'            => ['sometimes', 'boolean'],
            'medical_history'   => ['sometimes', 'string'],
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
            'user_id.required'      => 'User is required',
            'user_id.exists'        => 'User does not exist',
            'phone.required'        => 'Phone is required',
            'address.required'      => 'Address is required',
            'dob.required'          => 'Date of birth is required',
            'gender.boolean'        =>  'Gender is required',
            'medical_history.required' => 'Medical history is required',
        ];
    }
}
