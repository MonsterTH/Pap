<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();

        return view('players.index', ['players' => $players]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.players.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'photo'  => 'nullable|image|max:2048',
            'status' => 'nullable|in:active,inactive',
        ]);

        $data = $request->only(['name', 'username', 'about', 'status']);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('players', 'public');
        }

        Player::create($data);

        return redirect()->route('admin.players.gerenciar')->with('success', 'Jogador adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $player = Player::findOrFail($id);
        return view('players.show', ['player' => $player]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player = Player::findOrFail($id);
        return view('admin.players.edit', ['player' => $player]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $player = Player::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:255',
            'photo'  => 'nullable|image|max:2048',
            'status' => 'nullable|in:active,inactive',
        ]);

        $data = $request->only(['name', 'username', 'about', 'status']);

        // Remove foto se checkbox marcado
        if ($request->has('remove_photo') && $player->photo) {
            Storage::disk('public')->delete($player->photo);
            $data['photo'] = null;
        }

        // Nova foto
        if ($request->hasFile('photo')) {
            if ($player->photo) {
                Storage::disk('public')->delete($player->photo);
            }
            $data['photo'] = $request->file('photo')->store('players', 'public');
        }

        $player->update($data);

        return redirect()->route('admin.players.manage')->with('success', 'Jogador atualizado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $player = Player::findOrFail($id);

        // apaga a foto do storage se existir
        if ($player->photo) {
            Storage::disk('public')->delete($player->photo);
        }

        $player->delete();

        return redirect()->back()->with('success', 'Jogador removido com sucesso!');
    }
}
