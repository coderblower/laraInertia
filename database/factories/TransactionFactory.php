<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'payment_type' => $this->faker->randomElement(['cash', 'stripe']),
            'order_id' => Order::factory(), // Assuming an Order factory exists, otherwise use real order IDs
            'user_serial' => $this->faker->uuid(),
            'stripe_session_id' => $this->faker->optional()->uuid(), // Only for 'stripe' payments
            'status' => $this->faker->randomElement(['Pending', 'Completed', 'Failed']),
        ];
    }
}
