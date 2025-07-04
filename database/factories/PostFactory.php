<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(2, true),
            'hotness' => $this->faker->numberBetween(1, 100),
            'views_count' => $this->faker->numberBetween(1, 3000),
            'created_at' => $this->faker->dateTimeBetween('-1 year', '-1 week'),
        ];
    }
}
