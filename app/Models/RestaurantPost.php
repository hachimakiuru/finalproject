<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantPost extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'open_time',
        'close_time',
        'genre_place',
        'genre_variety',
        'genre_religion',
        'genre_payment',
        'genre_wifi',
        'image_path',
        'favorite',
    ];

    /**
     * Get the user that owns the restaurant post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments for the restaurant post.
     */
    public function comments()
    {
        return $this->hasMany(RestaurantComment::class);
    }

    public function restaurantForm()
    {
        return $this->belongsTo(RestaurantForm::class);
    }
}
