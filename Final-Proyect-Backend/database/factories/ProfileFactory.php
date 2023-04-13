<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'surname' => fake()->lastName(),
            'phone_number' => fake()->phoneNumber(),
            'direction' => fake()->address(),
            'birth_date' =>  fake()->dateTimeBetween('-70 years, -18 years'),
            'user_id' => rand(5,15),
        ];
    }
}
