<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTimeLine  extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'start',
        'end',
        'price',
        'place',
        'others',
        'genre_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'price' => 'integer',
        // 'start' => 'datetime', 
    ];

    /**
     * Get the user that owns the model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function newsBooking()
    {
        return $this->hasMany(NewsBooking::class);
    }

 
}
