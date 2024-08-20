<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'post_id'
    ];

    public function post() // 34an lma 2kteb post->comment->body
    {
        return $this->belongsTo(Post::class);
    }
}
