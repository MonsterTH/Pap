<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Player;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'playersCount'  => Player::count(),
            'adminsCount'   => User::where('is_admin', 1)->count(),
            // 'activityCount' => Activity::count(), // adapta ao teu modelo
            // 'bountiesCount' => Bounty::count(),   // adapta ao teu modelo
            'latestPlayers' => Player::latest()->take(4)->get(),
            'latestAdmins'  => User::where('is_admin', 1)->latest()->take(4)->get(),
        ]);
    }
}
