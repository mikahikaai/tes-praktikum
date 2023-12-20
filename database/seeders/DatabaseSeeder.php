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
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Mas Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('12345'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Mas Owner',
            'username' => 'owner',
            'email' => 'owner@gmail.com',
            'role' => 'owner',
            'password' => bcrypt('12345'),
        ]);
    }
}
