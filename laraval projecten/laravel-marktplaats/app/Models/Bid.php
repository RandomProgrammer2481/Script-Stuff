<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    public function advertisement() {
        return $this->belongsTo(Advertisement::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }
}
