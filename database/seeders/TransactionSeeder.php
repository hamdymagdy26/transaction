<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TransactionSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $users= collect(User::all()->modelKeys());
        $data = [];

        for ($i = 0; $i < 500000; $i++) {
            $data[] = [
                'from' => $users->random(),
                'to' => $users->random(),
                'amount' => rand(1,199),
                'status' => rand(0,1),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
        }

        $chunks = array_chunk($data, 10000);

        foreach ($chunks as $chunk) {
            Transaction::insert($chunk);
        }
    }
}