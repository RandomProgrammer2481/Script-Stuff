<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;    

    protected $fillable = ['body', 'user_id', 'advertisement_id', 'chat_id']; 

    public function advertisement() {
        return $this->hasMany(Advertisement::class);
    }

    public function chat() {
        return $this->belongsTo(Chat::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
