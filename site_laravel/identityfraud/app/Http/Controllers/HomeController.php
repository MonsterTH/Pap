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

        $trending = News::whereHas('tags', function ($query) {
            $query->where('name', 'Trending');
        })->latest()->get();

        $novidades = News::whereHas('tags', function ($query) {
            $query->where('name', 'Novidades');
        })->latest()->get();

        return view('index', compact('players', 'trending', 'novidades'));
    }
}
