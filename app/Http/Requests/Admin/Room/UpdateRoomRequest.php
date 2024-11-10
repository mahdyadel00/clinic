<?php

namespace App\Http\Requests\Admin\Room;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoomRequest extends FormRequest
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
            'type'          => ['sometimes', 'string', 'max:255'],
            'description'   => ['sometimes', 'string', 'max:255'],
            'status'        => ['sometimes', 'boolean'],
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
            'type.string'           => 'Type must be a string',
            'type.max'              => 'Type must not be greater than 255 characters',
            'description.string'    => 'Description must be a string',
            'description.max'       => 'Description must not be greater than 255 characters',
            'status.boolean'        => 'Status must be a boolean',
        ];
    }
}
