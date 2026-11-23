<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use Illuminate\Database\Eloquent\Builder;

class NoteController extends Controller
{
    public function index(?int $ticket_id) {
        $notes = Note::query()
            ->when($ticket_id, function (Builder $q, int $ticket_id) {
                $q->where('ticket_id', $ticket_id);
                })
            ->orderByDesc('created_at')
            ->orderBy('body')
            ->get();
        
        return NoteResource::collection($notes);
    }

    public function store(StoreNoteRequest $request) {
        $arguments = array_merge($request->validated(), [
            'user_id' => $request->user()->id,
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
