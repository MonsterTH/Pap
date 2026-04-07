<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $players = Player::latest()->get();
        $trending = News::where('genre', 'Tr')->latest()->get();
        $novidades = News::where('genre', 'No')->latest()->get();

        return view('index', compact('players', 'trending', 'novidades'));
    }
}
