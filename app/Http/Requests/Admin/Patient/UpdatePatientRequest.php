<?php

namespace App\Http\Requests\Admin\Patient;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            'first_name'        => ['sometimes', 'string', 'max:255'],
            'last_name'         => ['sometimes', 'string', 'max:255'],
            'email'             => ['sometimes', 'string', 'email', 'max:255'],
            'phone'             => ['sometimes', 'string', 'max:255'],
            'address'           => ['sometimes', 'string', 'max:255'],
            'dob'               => ['sometimes', 'date'],
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