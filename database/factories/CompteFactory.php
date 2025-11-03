<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Client;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compte>
 */
class CompteFactory extends Factory
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
            'client_id' => Client::factory(),
            'solde_initial' => fake()->numberBetween(1000, 1000000),
            'numero_compte' => fake()->unique()->numerify('SN##########'),
        'statut' => fake()->randomElement(['actif', 'bloqué', 'archivé']),
            'type' => fake()->randomElement(['courant', 'épargne', 'Chèque']),
            'devise' => fake()->randomElement(['xof', 'usd', 'eur']),
            'motif_blocage' => fake()->optional()->sentence(),
        ];
    }
}
