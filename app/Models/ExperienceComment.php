<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'experience_post_id',
        'content',
        // 'created_at', 'updated_at' は自動的に設定されるため、ここには含めない
    ];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['user']; // モデルのロード時に常に'user'リレーションを取得する

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the experience post that the comment belongs to.
     */
    public function experiencePost()
    {
        return $this->belongsTo(ExperiencePost::class);
    }
}

