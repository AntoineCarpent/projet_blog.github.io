<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'title' => fake()->sentence(),
            'body' => fake()->paragraph(20),
            'picture' => fake()->randomelement(['images/Art_num_rique_et_art_digital.jpg', 'image/excellence-numerique.jpg', 'images/images.jpeg']),
            'user_id' => User::all()->random()->id
        ];
    }
}