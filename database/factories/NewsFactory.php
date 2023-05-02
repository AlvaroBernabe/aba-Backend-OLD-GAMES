<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'news_image' => fake()->imageUrl(),
                'title' => fake()->text(),
                'summary' => fake()->realTextBetween(100,150),
                'game_id' => $this->faker->numberBetween(1,77),
        ];
    }
}
