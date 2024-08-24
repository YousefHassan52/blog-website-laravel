<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'body',
        'post_id',
        'commentator_id'

    ];

    public function post() // 34an lma 2kteb post->comment->body
    {
        return $this->belongsTo(Post::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'commentator_id'); // 34an bs 2a2dar 2kteb comment->user->name 
    }
}
