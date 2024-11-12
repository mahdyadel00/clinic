<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'              => ['required','string','max:255'],
            'email'             => ['required','string', 'email','max:255', 'unique:users'],
            'phone'             => ['required','digits:11'],
            'password'          => ['required','string','min:8', 'confirmed']
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
            'name.required'     => 'Name is required',
            'email.required'    => 'Email is required',
            'phone.required'    => 'Phone is required',
            'password.required' => 'Password is required',
            'email.unique'      => 'Email already exists',
            'phone.digits'      => 'Phone number must be 11 digits',
            'password.min'      => 'Password must be at least 8 characters',
            'password.confirmed'=> 'Password confirmation does not match'
        ];
    }
}
