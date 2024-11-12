<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'          => ['sometimes', 'string', 'max:255'],
            'email'         => ['sometimes', 'string', 'email', 'max:255' , 'unique:users,email,' . $this->user],
            'phone'         => ['sometimes', 'string', 'max:255'],
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
            'name.string'           => 'Name must be a string',
            'name.max'              => 'Name must not be greater than 255 characters',

            'email.string'          => 'Email must be a string',
            'email.email'           => 'Email must be a valid email address',
            'email.max'             => 'Email must not be greater than 255 characters',
            'email.unique'          => 'Email must be unique',

            'phone.string'          => 'Phone must be a string',
            'phone.max'             => 'Phone must not be greater than 255 characters',
        ];
    }
}
