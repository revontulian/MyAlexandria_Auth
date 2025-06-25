<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3), // Generates a title with 3 words
            'author' => fake()->name(),
            'isbn' => fake()->unique()->isbn13(),
            'published_date' => fake()->dateTimeBetween('-10 years', 'now'),
            'genre' => fake()->word(),
            'is_public' => fake()->boolean(80), // 80% chance to be true
            'user_id' => fake()->numberBetween(1, 2)
        ];
    }
}
