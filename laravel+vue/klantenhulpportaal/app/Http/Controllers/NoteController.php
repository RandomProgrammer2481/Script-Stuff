<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;

class NoteController extends Controller
{
    public function indexByTicket(Ticket $ticket) {
        $notes = Note::query()
            ->where('ticket_id', $ticket->id)
            ->orderByDesc('created_at')
            ->orderBy('body')
            ->get();
        
        return NoteResource::collection($notes);
    }

    public function store(StoreNoteRequest $request, Ticket $ticket) {
        $arguments = array_merge($request->validated(), [
            'user_id' => $request->user()->id,
            'ticket_id' => $ticket->id
        ]);

        $note = Note::create($arguments);
        return new NoteResource($note);
    }

    public function update(StoreNoteRequest $request, Note $note) {
        $note->update($request->validated());

        return new noteResource($note);
    }

    public function destroy(Note $note) {
        $note->delete();
        return response()->json(['message' => "Succesfully deleted"]);
    }

}
