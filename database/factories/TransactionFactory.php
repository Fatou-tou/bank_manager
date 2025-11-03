<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Compte;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=>(string) Str::uuid(),
            'compte_id' => Compte::factory(),
            'typeTransaction' => fake()->randomElement(['dépot', 'retrait']),
            'montant' => fake()->randomFloat(2, 10, 10000),
            'statut' => fake()->randomElement(['en attente', 'complété', 'échoué']),
        ];
    }
}
