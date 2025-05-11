<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::factory()->create([
            'name' => 'Taller',
            'email' => 'taller@example.com',
            'role' => 'taller',
            'password' => bcrypt('abc123.'),
        ]);

        User::factory()->create([
            'name' => 'Cliente',
            'email' => 'cliente@example.com',
            'role' => 'cliente',
            'password' => bcrypt('abc123.'),
        ]);
    }
}
