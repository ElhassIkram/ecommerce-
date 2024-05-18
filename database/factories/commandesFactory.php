<?php

namespace Database\Factories;

use App\Models\etats;
use App\Models\mode_reglements;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\commandes>
 */
class commandesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->fake()->date(),
            'time' => $this->fake()->time(),
            'regle' => $this->fake()->boolean(),
            'mode_reglements_id' =>mode_reglements::factory()->create()->id,
            'etat_id' => etats::factory()->create()->id,
            'user_id' =>User::factory()->create()->id,
        ];
    }
}
