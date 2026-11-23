<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReactionRequest;
use App\Http\Resources\ReactionResource;
use App\Models\Reaction;
use App\Models\User;
use App\Notifications\GotReaction;
use Illuminate\Database\Eloquent\Builder;

class ReactionController extends Controller
{
    public function index(?int $ticket_id){

        $reactions = Reaction::query()
            ->when($ticket_id, function (Builder $q, int $ticket_id) {
                $q->where('ticket_id', $ticket_id);
                })
            ->orderByDesc('created_at')
            ->orderBy('body')
            ->get();
        
        return ReactionResource::collection($reactions);
    }

    public function store(StoreReactionRequest $request) {
        $arguments = array_merge($request->validated(), [
            'user_id' => $request->user()->id,
        ]);

        $reaction = Reaction::create($arguments);

        $ticket = $reaction->ticket;
        $ticket->creator->notify(new GotReaction($ticket));
        return new ReactionResource($reaction);
    }

    public function update(StoreReactionRequest $request, Reaction $reaction) {
        $reaction->update($request->validated());

        return new ReactionResource($reaction);
    }
}
