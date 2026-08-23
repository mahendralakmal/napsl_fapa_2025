<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed admin and client users.
     *
     * Roles:
     * - admin  → full access
     * - client → upload photos and update own profile
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@fapa.local'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'avatar' => 'avatar-1.jpg',
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'client@fapa.local'],
            [
                'name' => 'Client User',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'avatar' => 'avatar-1.jpg',
                'role' => 'client',
            ]
        );

        // Ensure the legacy migration admin account has the admin role
        User::where('email', 'admin@themesbrand.com')->update(['role' => 'admin']);
    }
}
