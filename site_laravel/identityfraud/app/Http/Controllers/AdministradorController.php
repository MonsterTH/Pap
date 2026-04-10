<?php

namespace App\Http\Controllers;
use App\Models\Player;
use App\Models\Activity;
use App\Models\Bounty;
use App\Models\Eviction;
use App\Models\User;
use App\Models\News;
use App\Models\Season;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        $latestPlayers = Player::latest()->take(4)->get();
        $latestNews = News::latest()->take(4)->get();
        $latestSeason = Season::latest()->take(1)->get();
        $latestEviction = Eviction::latest()->take(4)->get();
        return view('admin.dashboard', [
        'playersCount' => Player::count(),
        'activityCount' => Activity::count(),
        'bountiesCount' => Bounty::count(),
        'adminsCount' => User::where('is_admin', 1)->count(),
    ], compact('latestPlayers', 'latestNews', 'latestSeason', 'latestEviction'));
    }
}
