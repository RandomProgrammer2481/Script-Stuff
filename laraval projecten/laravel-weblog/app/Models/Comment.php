<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'blog_id',
        'user_id',
    ];

    use HasFactory;

    public function blog() {
        $this->belongsTo(Blog::class);
    }

    public function user() {
        $this->belongsTo(User::class);
    }
}
