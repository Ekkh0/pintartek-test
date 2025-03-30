<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CardioEntry>
 */
class CardioEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'date' => $this->faker->dateTimeBetween('-3 years', 'now')->format('Y-m-d'),
            'type_id' => $this->faker->numberBetween(1, 4),
            'duration' => $this->faker->numberBetween(60, 7200),
            'distance' => $this->faker->randomFloat(1, 1, 42.2),
        ];
    }
}
