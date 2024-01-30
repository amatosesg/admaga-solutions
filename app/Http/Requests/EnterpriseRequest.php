<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnterpriseRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            // 'description' => ['required', 'string', 'max:1000'],
            'bbdd_name' => ['required', 'string', 'max:50', 'unique:enterprises'],
            'url_name' => ['required', 'string', 'max:100', 'unique:enterprises'],
            'image' => ['nullable', 'image']
        ];
    }
}
