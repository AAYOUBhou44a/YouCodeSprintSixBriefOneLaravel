<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            // quand on fait confirmed laravel cherche dans le Request un autre input qu'a le meme nom que
            //  l'input avec confirmed + _confirmaion , exemple: password_confiramtion 
            'city' => 'required|min:3',
            'street' => 'required|min:3'
        ];
    }

    public function messages(): array
    {
        return[
            'name.required' => 'le nom ne peut pas etre vide',
            'name.min' => 'le nom complet doit contenir au moins 6 caractères',
            'email.email' => 'Veuillez entrer un email valid',
            'email.required' => 'le email ne peut pas etre vid',
            'email.unique' => 'email déja utilisé',
            'password.min' => 'le password doit contenir au moins 6 caractères',
            'password.required' => 'le password ne peut pas etre vid',
            'password.confirmed' => 'confirmation du mot de passe invalid',
            'city.required' => 'le nom de ville ne peut pas etre vid',
            'city.min' => 'le nom du ville doit contenir au moins 3 caractères',
            'street.required' => 'le nom du quartier ne peut pas etre vid',
            'street.min' => 'le nom du quartier doit contenir au moins 3 caractères'
        ];
    }
}
