<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'merchantName' => 'required|max:100',
            'merchantAddress' => 'required',
            'merchantFounder' => 'required',
            'categoryMerchant' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'merchantName.required' => 'The store name must be filled in',
            'merchantName.max' => 'Maximum store name is 100 letters',
            //
            'merchantAddress.required' => 'The store address is required',
            //
            'merchantFounder.required' => 'The name of the Owner of the store must be filled in',
            //
            'categoryMerchant.required' => 'Store category required'
        ];
    }
}
