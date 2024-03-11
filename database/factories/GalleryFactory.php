<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $caption = fake()->sentence(fake()->numberBetween(4, 8));
        return [
            'user_id' => fake()->numberBetween(1, 5),
            'image' => 'img/user.jpg',
            'caption' => $caption,
            'author' => fake()->numberBetween(1, 5),
            'slug' => str_replace(' ', '', fake()->shuffle($caption)),
        ];
    }
}
