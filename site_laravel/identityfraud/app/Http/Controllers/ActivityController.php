<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Player;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $playerOptions = Player::all()->map(function ($player) {
            return [
                'value' => $player->id,
                'label' => $player->name,
                'image' => $player->photo ? asset('storage/' . $player->photo) : asset('storage/images/default.png'),
            ];
        })->toArray(); // importante: passar como array para o componente
        $players = Player::all();
        return view('activity.create', ['playerOptions' => $playerOptions]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'type' => 'required|string',
        'start_date' => 'required|date',
        'winner_id' => 'required|exists:players,id'
    ]);

    Activity::create([
        'name' => $request->name,
        'description' => $request->description,
        'type' => $request->type,
        'start_date' => $request->start_date,
        'winner_id' => $request->winner_id
    ]);

    return back()->with('success', 'Atividade criada com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
