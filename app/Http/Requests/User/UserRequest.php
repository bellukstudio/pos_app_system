<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => 'required|email:dns|unique:master_users,email',
            'photo' => 'sometimes|image|max:2048|mimes:png,jpg,jpeg',
            'password' => 'required|min:6',
            'rolesSelect' => 'required'
        ];
    }
}
