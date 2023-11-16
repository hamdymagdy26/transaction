<?php

namespace Database\Seeders;

use App\Models\User;
use App\Utility\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => Roles::ADMIN,
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'role' => Roles::CUSTOMER,
            'password' => Hash::make('654321'),
        ]);
    }
}
