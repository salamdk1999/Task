<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'slug',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'float',
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the price attribute based on the user type.
     *
     * @return float
     */
    public function getPriceAttribute(): float
    {
        $userType = Auth::user()->type;

        switch ($userType) {
            case 'gold':
                return $this->attributes['price'] * 0.7; // Apply 30% discount for gold users
            case 'silver':
                return $this->attributes['price'] * 0.8; // Apply 20% discount for silver users
            default:
                return $this->attributes['price'];
        }
    }
}