<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantForm extends Model
{
    protected $fillable = [
        'user_id',
        'restaurant_post_id',
        'day',
        'time1',
        'time2',
        'number_guests',
        'memo',
    ];

    protected $dates = [
        'day',
        'time1',
        'time2',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurantPost()
    {
        return $this->belongsTo(RestaurantPost::class, 'restaurant_post_id');
    }
}
