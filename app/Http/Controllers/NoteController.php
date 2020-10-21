<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use App\Http\Requests\NoteRequest;

class NoteController extends Controller
{
    public function overview()
    {
        $notes = Note::where('user_id', Auth::id())->get();
        return view(
            'note.list',
            compact(
                'notes'
            )
        );
    }

    public function create()
    {
        return view(
            'note.form',
        );
    }

    public function view()
    {
        $note = Note::where('id', request('note_id'))
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view(
            'note.form',
            compact('note')
        );
    }

    public function store(NoteRequest $request)
    {
        $validated = $request->validated();

        $note = Note::where('id', request('note_id'))
            ->where('user_id', Auth::id())
            ->first();

        if (!$note) {
            $note = new Note();
        }

        $validated['user_id'] = Auth::id();
        $note->fill($validated);
        $note->save();

        if(!isset($validated['categories'])) {
            $validated['categories'] = [];
        }

        $note->categories()->sync($validated['categories']);

        return redirect(route('note.list'))->with('status', 'Note Saved');
    }
}
