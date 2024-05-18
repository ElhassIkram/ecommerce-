<?php

namespace Database\Factories;

use App\Models\marques;
use App\Models\sous_familles;
use App\Models\unites;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\produits>
 */
class produitsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codebarre' => fake()->unique()->randomNumber(),
            'designation' =>fake()->word(),
            'prix_ht' =>fake()->randomNumber(4),
            'tva' =>fake()->numberBetween(0, 20),
            'description' =>fake()->sentence(),
            'image' => fake()->imageUrl(),
            'sous_famille_id' =>sous_familles::factory()->create()->id,
            'marque_id' =>marques::factory()->create()->id,
            'unite_id' => unites::factory()->create()->id,
        ];
    }
}
