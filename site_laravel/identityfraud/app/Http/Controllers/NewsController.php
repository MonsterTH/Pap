<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Tags;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trending = News::whereHas('tags', function ($query) {
            $query->where('name', 'Trending');
        })->get();

        $novidades = News::whereHas('tags', function ($query) {
            $query->where('name', 'Novidades');
        })->get();

        $drama = News::whereHas('tags', function ($query) {
            $query->where('name', 'Drama');
        })->get();

        return view('news.index', compact('trending', 'novidades', 'drama'));
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
