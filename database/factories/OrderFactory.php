<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'pizza_id' => Pizza::factory(), // Assuming a pizza factory exists
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'mobile' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'user_serial' => $this->faker->uuid(),
            'payment_type' => $this->faker->randomElement(['cash', 'stripe']),
            'status' => $this->faker->randomElement(['Ordered', 'Prepping', 'Baking', 'Checking', 'Ready']),
            'pizza_name' => $this->faker->word() . ' Pizza', // e.g., "Pepperoni Pizza"
            'size' => $this->faker->randomElement(['small', 'medium', 'large']),
            'crust' => $this->faker->randomElement(['thin', 'thick', 'stuffed']),
            'toppings' => $this->faker->randomElements(['cheese', 'pepperoni', 'mushrooms', 'olives'], 3),
            'quantity' => $this->faker->numberBetween(1, 5),
            'pizza_price' => $this->faker->randomFloat(2, 5, 20), // Random price between 5 and 20
            'other_charge' => $this->faker->optional()->randomFloat(2, 1, 5), // Random additional charge or null
            'total_price' => fn(array $attributes) => $attributes['pizza_price'] * $attributes['quantity'], // Calculate total price
        ];
    }
}
