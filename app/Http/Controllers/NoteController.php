<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Category;
use App\Models\Note;
use Auth;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function overview()
    {
        $notes = Note::where('user_id', Auth::id())->get();
        // dd($notes->catogories);
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
            ['allCategories' => Category::all()],
            ['categories' => null],

        );
    }

    public function view()
    {
        $note = Note::where('id', request('note_id'))
            ->where('user_id', Auth::id())
            ->firstOrFail();

            $categories = $note->categories;
            $allCategories = Category::all();

        return view(
            'note.form',
            compact('note', 'categories', 'allCategories')
        );
    }

    public function store(NoteRequest $request)
    {
        // dd($request->validated([
        //     'title' => 'required'
        // ]));
        $validated = $request->validated();

        $note = Note::where('id', request('note_id'))
            ->where('user_id', Auth::id())
            ->first();

        if (!$note) {
            $note = new Note();
        }

        // if (!isset($validated['content'])) {
        //     $validated['content'] = '';
        // }
        // hack is a bad solution

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
