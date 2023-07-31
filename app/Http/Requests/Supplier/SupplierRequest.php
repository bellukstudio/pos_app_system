<?php

namespace App\Http\Requests\Supplier;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'supplierName' => 'required|max:100|unique:master_suppliers,supplierName',
            'companyName' => 'required|max:100',
            'phoneNumber' => 'required|regex:/^\+\d{1,3}\d{1,14}$/'
        ];
    }
}
