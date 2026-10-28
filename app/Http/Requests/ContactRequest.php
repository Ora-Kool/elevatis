<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30', 'regex:/^[0-9+().\s-]+$/'],
            'subject' => ['required', Rule::in(array_keys(config('elevatis.contact_subjects')))],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'website' => ['prohibited'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'first_name' => 'prénom',
            'last_name' => 'nom',
            'email' => 'adresse e-mail',
            'phone' => 'téléphone',
            'subject' => 'sujet',
            'message' => 'message',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => 'Le champ :attribute est obligatoire.',
            'email' => 'Veuillez saisir une adresse e-mail valide.',
            'max' => 'Le champ :attribute est trop long.',
            'min' => 'Votre :attribute doit contenir au moins :min caractères.',
            'phone.regex' => 'Veuillez saisir un numéro de téléphone valide.',
            'subject.in' => 'Veuillez choisir un sujet dans la liste.',
            'website.prohibited' => 'Votre message n’a pas pu être envoyé.',
        ];
    }
}
