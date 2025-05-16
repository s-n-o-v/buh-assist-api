<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Note\NoteResource;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NoteResource::collection(Note::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required|numeric|exists:clients,id',
            'content' => 'nullable|string',
        ]);

        $note = Note::create($data);
        return new NoteResource($note);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $note = Note::findOrFail($id);
        return new NoteResource($note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'client_id' => 'required|numeric|exists:clients,id',
            'content' => 'nullable|string',
        ]);
        $note = Note::findOrFail($id);
        $note->update($data);
        return new NoteResource($note);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Note::findOrFail($id);
        $tag->delete();
        return response()->noContent();
    }
}
