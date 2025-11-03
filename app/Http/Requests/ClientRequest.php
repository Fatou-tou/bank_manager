<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'nomComplet' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'telephone' => 'required|string|unique:clients,telephone',
            'dateNaissance' => 'required|date',
            'genre' => 'required|in:homme,femme',
            'adresse' => 'required|string|max:500',
            'cni' => 'required|string|unique:clients,cni',
            'password' => 'required|string|min:4|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'nomComplet.required' => 'Le nom complet est obligatoire.',
            'email.required' => "L'adresse e-mail est obligatoire.",
            'email.email' => "L'adresse e-mail doit être valide.",
            'email.unique' => "L'adresse e-mail est déjà utilisée.",
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'telephone.unique' => 'Le numéro de téléphone est déjà utilisé.',
            'dateNaissance.required' => 'La date de naissance est obligatoire.',
            'genre.required' => 'Le genre est obligatoire.',
            'genre.in' => 'Le genre doit être "homme" ou "femme".',
            'adresse.required' => "L'adresse est obligatoire.",
            'cni.required' => 'Le numéro de CNI est obligatoire.',
            'cni.unique' => 'Le numéro de CNI est déjà utilisé.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ];
    }
}
