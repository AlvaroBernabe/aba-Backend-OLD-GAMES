<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'player_score' => rand(0,10),
            'player_review' => fake()->realText(),
            'favourite' => rand(0,1),
            'game_id' => $this->faker->numberBetween(1,77),
            'user_id' => $this->faker->numberBetween(1,5),
        ];
    }
}
