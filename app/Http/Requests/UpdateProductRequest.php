<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'id' => 'required|integer|exists:products,id',
            'name' => 'string',
            'description' => 'string|nullable',
            'price' => 'decimal:0,2',
            'quantity' => 'integer',
        ];
    }

    public function all($keys = null)
    {
        return array_merge(parent::all(), ['id' => $this->route()->parameters()['product']['id']]);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'appointment' => 'Invalid product',
        ];
    }
}
