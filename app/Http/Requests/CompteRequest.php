<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompteRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'solde_initial' => 'required|numeric|min:0',
            'numero_compte' => 'required|string|unique:comptes,numero_compte',
            'statut' => 'required|in:actif,bloqué,archivé',
            'type' => 'required|in:courant,épargne,Chèque',
            'devise' => 'required|in:xof,usd,eur',
            'motif_blocage' => 'nullable|string|max:255',
        ];
    }

    public function message(){
        return [
            'client_id.required' => 'L\'ID du client est obligatoire.',
            'client_id.exists' => 'Le client spécifié n\'existe pas.',
            'solde_initial.required' => 'Le solde initial est obligatoire.',
            'solde_initial.numeric' => 'Le solde initial doit être un nombre.',
            'solde_initial.min' => 'Le solde initial ne peut pas être négatif.',
            'numero_compte.required' => 'Le numéro de compte est obligatoire.',
            'numero_compte.unique' => 'Le numéro de compte est déjà utilisé.',
            'statut.required' => 'Le statut du compte est obligatoire.',
            'statut.in' => 'Le statut doit être "actif", "bloqué" ou "archivé".',
            'type.required' => 'Le type de compte est obligatoire.',
            'type.in' => 'Le type doit être "courant", "épargne" ou "Chèque".',
            'devise.required' => 'La devise du compte est obligatoire.',
            'devise.in' => 'La devise doit être "xof", "usd" ou "eur".',
            'motif_blocage.string' => 'Le motif de blocage doit être une chaîne de caractères.',
            'motif_blocage.max' => 'Le motif de blocage ne peut pas dépasser :max caractères.',
        ];
    }
}
