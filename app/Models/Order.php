<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'pizza_id',        // Foreign key to the pizzas table
        'name',            // Customer's name
        'address',        // Customer's address (note the extra 's' at the end)
        'mobile',          // Customer's mobile number
        'email',           // Customer's email
        'user_serial',     // User's serial number (if applicable)
        'payment_type',    // Payment method (cash or stripe)
        'status',          // Order status
        'pizza_name',      // Name of the pizza
        'size',            // Size of the pizza
        'crust',           // Type of crust
        'toppings',        // Toppings on the pizza (stored as JSON)
        'quantity',        // Quantity of pizzas ordered
        'pizza_price',     // Price of the pizza
        'other_charge',    // Any additional charges (nullable)
        'total_price',     // Total price for the order
    ];

    protected $appends = ['order_date'];

    protected $casts = [
        'toppings' => 'array',

    ];


    public function getOrderDatedAttribute()
    {
        return $this->created_at->format('d, F Y');
    }

    public function pizza(): BelongsTo
    {
        return $this->belongsTo(Pizza::class);
    }

}
