<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Juan Dela Cruz',
            'username' => 'juandelacruz',
            'full_name' => 'Juan Dela Cruz',
            'email' => 'juan.user@example.com',
            'password' => 'Password123',
        ]);

        User::create([
            'name' => 'Maria Santos',
            'username' => 'mariasantos',
            'full_name' => 'Maria Santos',
            'email' => 'maria.user@example.com',
            'password' => 'Password123',
        ]);

        User::create([
            'name' => 'Pedro Reyes',
            'username' => 'pedroreyes',
            'full_name' => 'Pedro Reyes',
            'email' => 'pedro.user@example.com',
            'password' => 'Password123',
        ]);

        User::create([
            'name' => 'Ana Garcia',
            'username' => 'anagarcia',
            'full_name' => 'Ana Garcia',
            'email' => 'ana.user@example.com',
            'password' => 'Password123',
        ]);

        User::create([
            'name' => 'Miguel Ramos',
            'username' => 'miguelramos',
            'full_name' => 'Miguel Ramos',
            'email' => 'miguel.user@example.com',
            'password' => 'Password123',
        ]);
    }
}