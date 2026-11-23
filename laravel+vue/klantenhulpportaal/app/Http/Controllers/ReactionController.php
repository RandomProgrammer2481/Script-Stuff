<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReactionResource;
use App\Models\Reaction;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;


class ReactionController extends Controller
{
    public function index(Ticket $ticket){

        $reactions = Reaction::query()
            ->when($ticket, function (Builder $q, Ticket $ticket) {
                $q->where('ticket_id', $ticket->id);
                })
            ->orderByDesc('created_at')
            ->orderBy('body')
            ->get();
        
        return ReactionResource::collection($reactions);
    }

    public function store(){
        
    }
}
