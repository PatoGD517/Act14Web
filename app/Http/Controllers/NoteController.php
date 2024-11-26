<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Carbon;

class NoteController extends Controller
{
    // Retrieve all notes
    public function index()
    {
        $notes = Note::all();
        return response()->json($notes, 200);
    }

    // Store a new note
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'body' => 'required|string',
            'classification' => 'required|string|max:50',
        ]);

        // Create the note
        $note = Note::create([
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'body' => $validatedData['body'],
            'classification' => $validatedData['classification'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return response()->json($note, 201); // 201: Created
    }

    // Retrieve a single note
    public function show($id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['error' => 'Note not found'], 404); // 404: Not Found
        }

        return response()->json($note, 200);
    }

    // Update an existing note
    public function update(Request $request, $id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['error' => 'Note not found'], 404);
        }

        // Validate the incoming request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'body' => 'required|string',
            'classification' => 'required|string|max:50',
        ]);

        // Update the note
        $note->update([
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'body' => $validatedData['body'],
            'classification' => $validatedData['classification'],
            'updated_at' => Carbon::now(),
        ]);

        return response()->json($note, 200);
    }

    // Delete a note
    public function destroy($id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['error' => 'Note not found'], 404);
        }

        $note->delete();

        return response()->json(['message' => 'Note deleted successfully'], 200);
    }
}
