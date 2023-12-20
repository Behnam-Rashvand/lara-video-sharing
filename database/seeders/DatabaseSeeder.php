<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'behnam',
            'email' => 'behnam@gmail.com',
            'password' => '12345678'
        ]);

        $this->call([
            CategorySeeder::class,
            VideoSeeder::class ,
        ]);
    }
}
