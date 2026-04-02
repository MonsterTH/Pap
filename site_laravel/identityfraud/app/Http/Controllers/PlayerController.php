<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
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

        // Upload da imagem
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('players', 'public');
        }

        Player::create($data);

        return redirect()->route('admin.players.manage')
            ->with('success', 'Jogador criado com sucesso!');
    }

    public function show(string $id)
    {
        $player = Player::findOrFail($id);
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
            if ($player->photo) {
                Storage::disk('public')->delete($player->photo);
            }

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

        $player->delete();

        return redirect()->back()
            ->with('success', 'Jogador removido com sucesso!');
    }
}
