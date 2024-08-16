<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "description",
        "user_id"

    ];

    // lazem teltzem bel tasmya zy ma 2na katebha ya 2ma tktb el foreign_key el 2nta hat4t8al 3leh
    public function user()
    {
        return $this->belongsTo(User::class); // 34an bs 2a2dar 2kteb post->user->name 
    }
    // de el tare2a el tanya lw hat8yar 2y 7aga fe el tasmya 2za kan 2esm el foreign key fe el table 2w 7ta 2esm el fucntion
    public function postCreator()
    {
        return   $this->belongsTo(User::class, 'user_id');
    }
}
