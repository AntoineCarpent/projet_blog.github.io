<?php

namespace Database\Seeders;

use App\Models\TestModel;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test',
        //     'email' => 'test@example.com',
        //     'password' => 'test63',
        // ]);
        TestModel::factory()->create([
            'title' => 'hello',
            'description' => 'gmoom rtgoitgoitg rtgo htgophg tgo ggotgo ',
        ]);
    }
}
