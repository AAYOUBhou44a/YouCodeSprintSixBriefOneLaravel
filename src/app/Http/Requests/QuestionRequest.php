<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'title' => 'required|min:5',
            'city' => 'required|min:3',
            'street' => 'required|min:3',
            'content' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'le titre ne peut pas etre vid',
            'title.min' => 'le titre doit contenir au moins 5 caractères',
            'city.required' => 'le nom de la ville ne peut pas etre vid',
            'city.min' => 'le nom de la ville doit contenir au moins 3 caractères',
            'street.required' => 'le nom du quartier ne peut pas etre vid',
            'street.min' => 'le nom du quartier doit contenir au moins 3 caractères',
            'content.required' => 'le contenu de la question ne peut pas etre vid'
        ];
    }
}
