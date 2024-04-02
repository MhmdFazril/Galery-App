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
        $caption = fake()->sentence(fake()->numberBetween(18, 34));
        return [
            'user_id' => fake()->numberBetween(1, 5),
            'image' => 'img/user.jpg',
            'caption' => $caption,
            'status' => fake()->randomElement([true, false]),
            'slug' => str_replace(' ', '-', $caption),
        ];
    }
}
