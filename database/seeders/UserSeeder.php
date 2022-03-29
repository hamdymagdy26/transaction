<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
        // For real data used in testing
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

        // For seeding date
        for ($i=0; $i < 30; $i++) { 
            DB::table('users')->insert([
                'name' => Str::random(10),
                'password' => bcrypt(Str::random(10).rand(1,1000)),
                'email' => Str::random(10).rand(1,1000).'@gmail.com',
                'admin' => rand(0,1)
            ]);
        }
    }
}
