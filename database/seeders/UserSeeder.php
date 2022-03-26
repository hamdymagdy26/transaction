<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Sameh Ashraf',
                'password' => bcrypt('123456'),
                'email' => 'sameh@gmail.com',
                'admin' => 0
            ],
            [
                'name' => 'Samy Hassan',
                'password' => bcrypt('123456'),
                'email' => 'samy@gmail.com',
                'admin' => 0
            ],
            [
                'name' => 'Mohamed Ashraf',
                'password' => bcrypt('123456'),
                'email' => 'mo@gmail.com',
                'admin' => 1
            ],
            [
                'name' => 'Hany Hussien',
                'password' => bcrypt('123456'),
                'email' => 'hany@gmail.com',
                'admin' => 1
            ]
        ]);
    }
}
