<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id' => rand(1, Post::count()),
            'content' => $this->faker->paragraph(),
            'user_id' => rand (1, User::count()),
            'image' => 'default_picture_' .rand(1,5). '.jpg',
            'tags' => $this->faker->words(3, true),
        ];
    }
}
