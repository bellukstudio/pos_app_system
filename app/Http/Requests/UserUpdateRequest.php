<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'fullName' => 'required|max:100',
            'email' => 'sometimes|email:dns',
            'photo' => 'sometimes|image|max:2048|mimes:png,jpg,jpeg',
            'password' => 'sometimes',
            'rolesSelect' => 'required'
        ];
    }
}
