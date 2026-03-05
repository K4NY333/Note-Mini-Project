<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{   

    public function SearchNote(Request $request)
{
    $param = $request->query('param');

    $notes = Note::where('user_id', auth()->id())
        ->where(function($query) use ($param) {
            $query->where('title', 'like', '%' . $param . '%')
                  ->orWhere('content', 'like', '%' . $param . '%')
                  ->orWhere('created_at', 'like', '%' . $param . '%');
        })
        ->get();

    return view('dashboard', compact('notes'));
}   

        public function CreateNote(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Note::create([
            'user_id' => auth()->id(),
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return request()->expectsJson()
            ? response()->json(['message' => 'Note saved successfully!', 'note' => $note], 201)
            : redirect()->back()->with('success', 'Note saved successfully!');
    }

    public function ReadNote()
{
    $notes = Note::where('user_id', auth()->id())->get();

    return request()->expectsJson()
        ? response()->json(['message' => 'Notes retrieved successfully', 'data' => $notes], 200)
        : view('dashboard', compact('notes'));
}

    public function UpdateNote(Request $request, $id)
    {
        $validated = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note = Note::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $note->update($validated);

        return back()->with('success', 'Note updated successfully!');
    }

    public function DeleteNote($id)
    {
        $note = Note::withTrashed()->find($id);

        if (!$note) {
            return request()->expectsJson()
                ? response()->json(['message' => "Note with ID {$id} does not exist."], 404)
                : back()->with('error', "Note does not exist.");
        }

        if ($note->trashed()) {
            return request()->expectsJson()
                ? response()->json(['message' => "{$note->title} is already in trash."], 400)
                : back()->with('error', "{$note->title} is already in trash.");
        }

        $note->delete();

        return request()->expectsJson()
            ? response()->json(['message' => "'{$note->title}' has been moved to trash."], 200)
            : back()->with('success', "'{$note->title}' has been moved to trash.");
    }

    public function RecycleBin()
    {
        $deletedNotes = Note::onlyTrashed()->where('user_id', auth()->id())->get();

        return response()->json([
            'message' => 'All Deleted Notes',
            'data' => $deletedNotes
        ], 200);
    }

    public function RestoreNote($id)
    {
        $note = Note::onlyTrashed()->where('user_id', auth()->id())->findOrFail($id);
        $note->restore();

        return request()->expectsJson()
            ? response()->json(['message' => 'Note restored successfully', 'note' => $note], 200)
            : redirect()->route('dashboard')->with('success', 'Note restored successfully!');
    }

    public function Pagination(Request $request)
    {
        $notes = Note::where('user_id', auth()->id())->paginate(10);

        return response()->json([
            'message' => 'Displayed 10 contents per page',
            'notes' => $notes
        ], 200);
    }
}