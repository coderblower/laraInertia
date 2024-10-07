<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        // Generate 10 fake transaction records
        Transaction::factory()->count(10)->create();
    }
}
