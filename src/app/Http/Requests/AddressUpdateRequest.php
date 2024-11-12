<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
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
            "zip-code" => ["string", "regex:/^\d{3}-?\d{4}$/"],
            "address" => ["string"],
            "building-name" => ["string"],
        ];
    }

    public function messages()
    {
        return [
            "zip-code.regex" => "郵便番号に正しい形式を指定してください。"
        ];
    }
}
