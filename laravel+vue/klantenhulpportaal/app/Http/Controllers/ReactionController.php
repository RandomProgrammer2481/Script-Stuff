<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReactionRequest;
use App\Http\Resources\ReactionResource;
use App\Models\Reaction;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\GotReaction;
use Illuminate\Database\Eloquent\Builder;

class ReactionController extends Controller
{
    public function indexByTicket(Ticket $ticket){

        $reactions = Reaction::query()
            ->where('ticket_id', $ticket->id)
            ->orderByDesc('created_at')
            ->orderBy('body')
            ->get();
        
        return ReactionResource::collection($reactions);
    }

    public function store(StoreReactionRequest $request, Ticket $ticket) {
        $arguments = array_merge($request->validated(), [
            'user_id' => $request->user()->id,
            'ticket_id' => $ticket->id
        ]);

        $reaction = Reaction::create($arguments);

        $ticket->creator->notify(new GotReaction($ticket));
        return new ReactionResource($reaction);
    }

    public function update(StoreReactionRequest $request, Reaction $reaction) {
        $reaction->update($request->validated());

        return new ReactionResource($reaction);
    }
}
