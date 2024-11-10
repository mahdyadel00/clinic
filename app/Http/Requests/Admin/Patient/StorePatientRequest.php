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
            'first_name'        => ['required', 'string', 'max:255'],
            'last_name'         => ['required', 'string', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:patients'],
            'phone'             => ['required', 'string', 'max:255'],
            'address'           => ['required', 'string', 'max:255'],
            'dob'               => ['required', 'date'],
            'gender'            => ['sometimes', 'boolean'],
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
            'first_name.required'   => 'First name is required',
            'last_name.required'    => 'Last name is required',
            'email.required'        => 'Email is required',
            'phone.required'        => 'Phone is required',
            'address.required'      => 'Address is required',
            'dob.required'          => 'Date of birth is required',
            'gender.boolean'        =>  'Gender is required',
        ];
    }
}
