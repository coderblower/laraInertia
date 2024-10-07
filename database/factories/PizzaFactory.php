<?php

namespace Database\Factories;

use App\Models\Pizza;
use Illuminate\Database\Eloquent\Factories\Factory;

class PizzaFactory extends Factory
{
    protected $model = Pizza::class;

    // Array of Picsum images related to pizza (these are general food placeholder images)
    private $pizzaImages = [
        'https://picsum.photos/id/1080/640/480', // Random food-related image
        'https://picsum.photos/id/292/640/480',
        'https://picsum.photos/id/1081/640/480',
        'https://picsum.photos/id/1060/640/480',
        'https://picsum.photos/id/1062/640/480',
        'https://picsum.photos/id/1056/640/480',
        'https://picsum.photos/id/1059/640/480',
        'https://picsum.photos/id/1055/640/480',
        'https://picsum.photos/id/1058/640/480',
        'https://picsum.photos/id/1069/640/480',
    ];

    public function definition()
    {
        return [
            'name' => $this->faker->word() . ' Pizza', // e.g., "Margherita Pizza"
            'image' => $this->faker->randomElement($this->pizzaImages), // Random pizza image from Picsum
            'size' => $this->faker->randomElements(['small', 'medium', 'large'], 2), // JSON array for size
            'crust' => $this->faker->randomElements(['thin', 'thick', 'stuffed'], 2), // JSON array for crust
            'toppings' => $this->faker->randomElements(['cheese', 'pepperoni', 'mushrooms', 'olives'], 3), // JSON array for toppings
            'price' => $this->faker->randomFloat(2, 5, 20), // Random price between 5.00 and 20.00
        ];
    }
}
