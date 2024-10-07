<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'size',
        'crust',
        'toppings',
        'price',
    ];

    protected $appends = ['last_updated'];

    protected $casts = [
        'crust' => 'array',
        'size' => 'array',
        'toppings' => 'array',
    ];

    protected $hidden = [
        'user',
    ];

    // Corrected function signature for user relation
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }

    // Corrected method name to getLastUpdatedAttribute
    public function getLastUpdatedAttribute()
    {
        return $this->updated_at->diffForHumans();
    }
}
