<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
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
            'rolesName' => 'required|unique:master_roles,rolesName|max:20'
        ];
    }

    public function messages()
    {
        return [
            'rolesName.required' => 'The roles name must be filled in',
            'rolesName.max' => 'Maximum store name is 20 letters',
            'rolesName.unique' => 'Roles name is already saved',
        ];
    }
}
