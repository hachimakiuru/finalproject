<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_post_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function restaurantPost()
    {
        return $this->belongsTo(RestaurantPost::class);
    }
}
