<?php

namespace Database\Factories;
use Illuminate\Support\Str;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
    {
        // Génère une date de naissance aléatoire
        $dateNaissance = fake()->dateTimeBetween('1970-01-01', '2005-12-31');
        $prefix = $dateNaissance->format('ymd'); // pour nouvelle CNI

        // Choisir aléatoirement le type de CNI
        $typeCni = fake()->randomElement(['ancienne', 'nouvelle']);

        $cni = $typeCni === 'nouvelle'
            ? $prefix . fake()->numerify('12#####')   // nouvelle génération 13 chiffres
            : fake()->numerify('########') . fake()->randomLetter(); // ancienne génération 8 chiffres + lettre

        return [
            'id' => (string) Str::uuid(),
            'nomComplet' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'telephone' => fake()->numerify('77########'), // format Sénégal
            'dateNaissance' => $dateNaissance->format('Y-m-d'),
            'genre' => fake()->randomElement(['homme', 'femme']),
            'adresse' => fake()->address(),
            'cni' => $cni,
            'password' => bcrypt('password'),
        ];
    }
}
