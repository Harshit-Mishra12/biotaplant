<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Prevent duplicate entries
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'), // Change to a strong password
                'role' => 'admin' // Assuming you have a 'role' column in your 'users' table
            ]
        );
    }
}
