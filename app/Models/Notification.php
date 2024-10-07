<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'data', // JSON data for the notification
        'read', // JSON indicating whether the notification has been read (nullable)
    ];

}
