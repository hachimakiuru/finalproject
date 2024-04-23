<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'is_admin',
        'name',
        'email',
        'password',
        'room_number',
        'email_verified_at',
        'memo',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function restaurantLike()
    {
        return $this->hasMany(RestaurantLike::class);
    }

    public function RestaurantPost(){
        return $this ->hasMany(RestaurantPost::class);
    }
}
