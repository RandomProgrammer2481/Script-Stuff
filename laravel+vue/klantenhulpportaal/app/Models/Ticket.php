<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['title', 'body', 'categories', 'creator_id', 'assignee_id', 'status_id'];

    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    public function categories() {
        return $this->belongsToMany(Category::class)
        ->withTimestamps();
    }

    public function creator() {
        return $this->belongsTo(User::class);
    }

    public function assignee() {
        return $this->belongsTo(User::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function notes() {
        return $this->hasMany(Note::class);
    }

    public function reactions() {
        return $this->hasMany(Reaction::class);
    }
}
