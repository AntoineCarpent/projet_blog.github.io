<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

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
            'password' => 'test63',
        ]);
        User::factory()->create([
            'name' => 'Michel',
            'role' => '1',
            'email' => 'Michel@example.com',
            'password' => 'azerty63',
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => 'azerty63',
        ]);
        User::factory()->create([
            'name' => 'Pat',
            'email' => 'Pat@example.com',
            'password' => 'azerty63',
        ]);
        User::factory()->create([
            'name' => 'to',
            'email' => 'to@example.com',
            'password' => 'azerty63',
        ]);
        User::factory()->create([
            'name' => 'ti',
            'email' => 'ti@example.com',
            'password' => 'azerty63',
        ]);
    }
}

