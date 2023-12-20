<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
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
            'body' => fake()->realText(),
            'user_id' => User::factory() ,
            'video_id' => Video::inRandomOrder()->first() ?? Video::factory(),
        ];
    }
}
