<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\CustomValidationErrorMessage;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    use CustomValidationErrorMessage;

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
            'name' => 'required|string',
            'email' => 'required|unique:users|email|string|min:5',
            'password' => 'string|min:4',
        ];
    }
}
