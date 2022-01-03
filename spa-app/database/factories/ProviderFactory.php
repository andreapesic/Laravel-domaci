<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone_number' => $this->faker->phoneNumber(),
            'years_of_experience' => $this->faker->numberBetween($min = 1, $max = 30),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
