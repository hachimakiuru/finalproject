<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'news_time_line_id',
        'day',
        'time1',
        'time2',
        'number_guests',
        'memo',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function newsPost()
    {
        return $this->belongsTo(NewsTimeLine::class, 'news_time_lines_id');
    }
}
