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
        $user_id = $this->faker->unique()->numberBetween(1,5);
        
        try {
            return [
                'name' => $this->faker->name(),
                'surname' => $this->faker->lastName(),
                'phone_number' => $this->faker->phoneNumber(),
                'direction' => $this->faker->address(),
                'birth_date' =>  $this->faker->dateTimeBetween('-70 years, -18 years'),
                'user_id' => $user_id,
            ];
        } catch (\Exception $e) {
            return $this->definition();
        }
    }
}
