<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;

class PizzaSeeder extends Seeder
{
    public function run()
    {
        // Generate 10 fake pizza records
        Pizza::factory()->count(10)->create();
    }
}
