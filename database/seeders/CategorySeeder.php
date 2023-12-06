<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'ورزشی' => [
                'slug' => 'sport',
                'icon' => 'fa fa-futbol-o'
            ],
            'بازی' => [
                'slug' => 'game',
                'icon' => 'fa fa-gamepad'
            ],
            'تاریخی' => [
                'slug' => 'historycal',
                'icon' => 'fa fa-university'
            ],
            'طنز' => [
                'slug' => 'fun',
                'icon' => 'fa fa-smile-o'
            ],
            'سینما' => [
                'slug' => 'cinema',
                'icon' => 'fa fa-film'
            ],
            'وحشت' => [
                'slug' => 'horror',
                'icon' => 'fa fa-hashtag'
            ],
            'تکنولوژی' => [
                'slug' => 'tech',
                'icon' => 'fa fa-laptop'
            ],
        ];

        foreach ($categories as $categoryName => $details){
            Category::create([
                'name' => $categoryName ,
                'slug' => $details['slug'] ,
                'icon' => $details['icon'] ,
            ]);
        }
    }
}
