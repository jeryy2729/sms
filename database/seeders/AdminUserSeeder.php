<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Check if admin already exists
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // Change this later
                'role' => 'admin', // assuming you added a 'role' column in users table
            ]
        );
    }
}
