<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Player;
use Illuminate\Http\Request;

class AdminPlayerController   extends Controller
{
    public function manage()
    {
        return view('admin.players.gerenciar', [
            'players' => Player::latest()->get()
        ]);
    }

    public function remove()
    {
        return view('admin.players.delete', [
            'players' => Player::latest()->get()
        ]);
    }

    public function consulta()
    {
        return view('admin.players.consulta', [
            'players' => Player::latest()->get()
        ]);
    }
}
