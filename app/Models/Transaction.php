<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_type',         // Type of payment (e.g., credit card, PayPal, etc.)
        'order_id',             // Foreign key referencing the orders table
        'user_serial',          // User's serial number (indexed for faster lookups)
        'stripe_session_id',    // Stripe session ID (nullable)
        'status',               // Status of the transaction (e.g., completed, pending, failed)
    ];
}
