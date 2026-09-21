<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*
To-do list:
Make controllers for the right views
couple them to the right routes
make sure the right items get passed through to the views

*/



class Blog extends Model
{
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id',
    ];

    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
