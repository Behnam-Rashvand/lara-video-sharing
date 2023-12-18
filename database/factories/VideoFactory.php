<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->name(),
            'slug'=> fake()->slug(),
            'url' => asset('storage/videos/1.mp4'),
            'length' => fake()->randomNumber(3 , false) ,
            'description' => fake()->realText(100),
            'thumbnail' => 'https://loremflickr.com/320/240?random=' . rand(1,99),
            'category_id'=> Category::inRandomOrder()->first(),
            'user_id' => User::inRandomOrder()->first() ?? User::factory() ,
        ];
    }
}
