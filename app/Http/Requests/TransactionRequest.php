<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'compte_id' => 'required|exists:comptes,id',
            'typeTransaction' => 'required|in:dépot,retrait',
            'montant' => 'required|numeric|min:0.01',
            'statut' => 'required|in:en attente,complété,échoué',
        ];
    }

    public function message(){
        return [
            'compte_id.required' => 'L\'ID du compte est obligatoire.',
            'compte_id.exists' => 'Le compte spécifié n\'existe pas.',
            'typeTransaction.required' => 'Le type de transaction est obligatoire.',
            'typeTransaction.in' => 'Le type de transaction doit être "dépot" ou "retrait".',
            'montant.required' => 'Le montant est obligatoire.',
            'montant.numeric' => 'Le montant doit être un nombre.',
            'montant.min' => 'Le montant doit être au moins :min.',
            'statut.required' => 'Le statut de la transaction est obligatoire.',
            'statut.in' => 'Le statut doit être "en attente", "complété" ou "échoué".',
        ];
    }
}
