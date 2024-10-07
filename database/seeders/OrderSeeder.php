<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Generate 10 fake order records
        Order::factory()->count(10)->create();
    }
}
