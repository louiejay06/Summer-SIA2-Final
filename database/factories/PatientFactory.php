<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'address' => fake()->address,
            'age' => fake()->numberBetween($min = 1, $max = 99),
            'weight' => fake()->numberBetween($min = 50, $max = 500),
            'height' => fake()->numberBetween($min = 50, $max = 200),
            'email' => fake()->freeEmail,
        ];
    }
}

