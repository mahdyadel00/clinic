<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
        return[
            'user_id'           => ['required', 'integer', 'exists:users,id'],
            'speciality'        => ['required', 'string', 'max:255'],
            'address'           => ['required', 'string', 'max:255'],
            'phone'             => ['required', 'string', 'max:255'],
            'experience_years'  => ['required', 'integer'],
            'bio'               => ['required', 'string', 'max:255'],
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
            'user_id.required'          => 'User is required',
            'user_id.integer'           => 'User must be an integer',
            'user_id.exists'            => 'User not found',

            'speciality.required'       => 'Speciality is required',
            'speciality.string'         => 'Speciality must be a string',
            'speciality.max'            => 'Speciality must not be greater than 255 characters',

            'address.required'          => 'Address is required',
            'address.string'            => 'Address must be a string',
            'address.max'               => 'Address must not be greater than 255 characters',

            'phone.required'            => 'Phone is required',
            'phone.string'              => 'Phone must be a string',
            'phone.max'                 => 'Phone must not be greater than 255 characters',

            'experience_years.required' => 'Experience years is required',
            'experience_years.integer'  => 'Experience years must be an integer',

            'bio.required'              => 'Bio is required',
            'bio.string'                => 'Bio must be a string',
            'bio.max'                   => 'Bio must not be greater than 255 characters',
        ];
    }
}
