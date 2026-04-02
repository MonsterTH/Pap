<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('news.index', [
        'trending' => News::where('genre', 'Tr')->latest()->get(),
        'novidades' => News::where('genre', 'No')->latest()->get(),
        'drama' => News::where('genre', 'Dr')->latest()->get(),]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'date' => 'required|date',
        'genre' => 'required',
        'description' => 'required',
        'image' => 'nullable|image|max:2048',
    ]);

    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('news', 'public');
    }

    News::create([
        'title' => $request->title,
        'date' => $request->date,
        'genre' => $request->genre,
        'description' => $request->description,
        'image' => $imagePath,
    ]);

    return back()->with('success', 'Notícia criada!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $new = News::findOrFail($id);
        return view('news.show', ['news' => $new]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
