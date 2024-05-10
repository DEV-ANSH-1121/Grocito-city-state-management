<?php

namespace App\Http\Requests\Admin\PinCode;

use Illuminate\Foundation\Http\FormRequest;

class StorePinCodeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'pin_code' => 'required|unique:pin_codes,pin_code',
            'city_id' => 'required|exists:cities,id',
        ];
    }
}
