<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
    }
    public function messages(): array 
    {
        return [
            'email.required' => 'Un email ne peut pas etre vid',
            'email.email' => 'email invalid', 
            'password.required' => 'Un password ne peut pas etre vid',
            'password.min' => 'Veuillez entrer un password avec plus que 6 caractères'
        ];
    }
}
