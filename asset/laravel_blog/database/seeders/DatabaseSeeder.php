<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'role' => '1',
            'password' => 'azerty63',
        ]);
        User::factory()->create([
            'name' => 'user',
            'role' => '0',
            'email' => 'user@example.com',
            'password' => 'azerty63',
        ]);

        User::factory(3)->create();

        $category = Category::factory(5)->create();

        Post::factory(20)->create()->each(function ($posts) use($category){
            $posts->categories()->attach($category->random());
        });
    }
}

