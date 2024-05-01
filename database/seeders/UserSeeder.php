<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'Admin',
            'is_admin' => true,
            'is_verified' => true,
        ]);

        User::create([
            'name' => 'user_verified',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('12345678'),
            'is_verified' => true,
        ]);

        User::create([
            'name' => 'user_unverified',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('12345678'),
            'is_verified' => false,
        ]);

        
    }
}