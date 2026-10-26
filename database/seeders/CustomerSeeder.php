<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'full_name' => 'Juan Dela Cruz',
            'email' => 'juan@example.com',
            'phone' => '09171234567',
        ]);

        Customer::create([
            'full_name' => 'Maria Santos',
            'email' => 'maria@example.com',
            'phone' => '09181234567',
        ]);

        Customer::create([
            'full_name' => 'Pedro Reyes',
            'email' => 'pedro@example.com',
            'phone' => '09191234567',
        ]);

        Customer::create([
            'full_name' => 'Ana Garcia',
            'email' => 'ana@example.com',
            'phone' => '09201234567',
        ]);

        Customer::create([
            'full_name' => 'Miguel Ramos',
            'email' => 'miguel@example.com',
            'phone' => '09211234567',
        ]);
    }
}