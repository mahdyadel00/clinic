<?php

namespace App\Http\Requests\Admin\PriceList;

use Illuminate\Foundation\Http\FormRequest;

class StorePriceListRequest extends FormRequest
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
            'service_name'          => ['required', 'string', 'max:255'],
            'price'                 => ['required', 'numeric'],
            'description'           => ['required', 'string'],
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
            'service_name.required'     => 'Please enter service name',
            'service_name.string'       => 'Service name must be string',
            'service_name.max'          => 'Service name must not be greater than 255 characters',
            'price.required'            => 'Please enter price',
            'price.numeric'             => 'Price must be numeric',
            'description.required'      => 'Please enter description',
            'description.string'        => 'Description must be string',
        ];
    }
}
