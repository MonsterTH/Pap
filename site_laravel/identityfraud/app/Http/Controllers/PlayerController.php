<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Bounty;
use App\Models\Activity;
use App\Models\Season;
use App\Models\Tags;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('players.index', compact('players'));
    }

    public function create()
    {
        return view('admin.players.create');
    }

public function store(Request $request)
{
    $request->validate([
        'name'        => 'required|string|max:255',
        'birth_date'  => 'nullable|date',
        'about'       => 'nullable|string',
        'photo'       => 'nullable|image|max:2048',
    ]);

    $data = $request->only(['name', 'birth_date', 'about']);

    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('players', 'public');
    }

    $player = Player::create($data);

    Tags::create(['name' => $player->name]);

    return redirect()->route('admin.players.manage')
        ->with('success', 'Jogador criado com sucesso!');
}

    public function show(string $id)
    {
        $player = Player::withCount([
            'wonSeasons',
            'bounties',
            'activities',
        ])->findOrFail($id);

        return view('players.show', compact('player'));
    }

    public function edit(string $id)
    {
        $player = Player::findOrFail($id);
        return view('admin.players.edit', compact('player'));
    }

    public function update(Request $request, string $id)
    {
        $player = Player::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'birth_date'  => 'nullable|date',
            'about'       => 'nullable|string',
            'photo'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'birth_date', 'about']);

        // // Remover foto
        // if ($request->has('remove_photo') && $player->photo) {
        //     Storage::disk('public')->delete($player->photo);
        //     $data['photo'] = 'images/default.png';
        // }

        // Upload nova foto
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('players', 'public');
        }

        $player->update($data);

        return redirect()->route('admin.players.manage')
            ->with('success', 'Jogador atualizado com sucesso!');
    }

public function destroy(string $id)
{
    $player = Player::findOrFail($id);

    if ($player->photo) {
        Storage::disk('public')->delete($player->photo);
    }

    Tags::where('name', $player->name)->delete();
    $player->delete();

    return redirect()->back()
        ->with('success', 'Jogador removido com sucesso!');
}
    public function wonActivities(string $id)
    {
        $player = Player::findOrFail($id);

        $activities = Activity::where('winner_id', $player->id)->get();

        return view('players.won-activities', compact('player', 'activities'));
    }

    public function bounties(string $id)
    {
        $player = Player::findOrFail($id);

        $bounties = Bounty::with('target')
            ->where('player_id', $player->id)
            ->where('completed', true)
            ->get();

        return view('players.bounties', compact('player', 'bounties'));
    }

    public function seasons(string $id)
    {
        $player = Player::findOrFail($id);

        $seasons = Season::where('winner_id', $player->id)->get();

        return view('players.seasons', compact('player', 'seasons'));
    }
}
