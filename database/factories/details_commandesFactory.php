<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\details_commandes>
 */
class details_commandesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'commande_id' => $this->fake()->numberBetween(1, 100),
            'produit_id' => $this->fake()->numberBetween(1, 100),
            'quantite' => $this->fake()->numberBetween(1, 10),
            'prix_ht' => $this->fake()->randomFloat(2, 10, 100),
            'tva' => $this->fake()->randomFloat(2, 0, 20),
        ];
    }
}
