<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
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
        //return Doctor::$rules;
        return [
            'user_id'           =>  ['sometimes', 'integer' , 'exists:users,id'],
            'speciality'        =>  ['sometimes', 'string'],
            'address'           =>  ['sometimes', 'string'],
            'phone'             =>  ['sometimes', 'string'],
            'experience_years'  =>  ['sometimes', 'integer'],
            'bio'               =>  ['sometimes', 'string'],
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
            'user_id.exists'        => 'The user id does not exist',
            'user_id.integer'       => 'The user id must be an integer',

            'speciality.string'     => 'The speciality must be a string',

            'address.string'        => 'The address must be a string',

            'phone.string'          => 'The phone must be a string',

            'experience_years.integer' => 'The experience years must be an integer',

            'bio.string'            => 'The bio must be a string',

        ];
    }

}
