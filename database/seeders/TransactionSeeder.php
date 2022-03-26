<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            [
                'from' => 1,
                'to' => 2,
                'amount' => 20
            ],
            [
                'from' => 2,
                'to' => 1,
                'amount' => 30
            ]
        ]);
    }
}
