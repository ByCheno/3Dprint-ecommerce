<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'user_type' => \App\Enums\UserType::Admin,
            'name' => 'Admin',
            'role_id' => 1,
            'password' => bcrypt('admin'), // password
            'email' => 'admin@adminlte.com',
        ]);
    }
}
