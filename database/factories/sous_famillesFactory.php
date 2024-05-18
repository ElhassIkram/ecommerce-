<?php

namespace Database\Factories;

use App\Models\familles;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\sous_familles>
 */
class sous_famillesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => fake()->word,
            'image' => fake()->imageUrl(),
            'famille_id' => familles::factory()->create()->id,
        ];
    }
}
