<?php

namespace App\Http\Controllers;
use App\Models\Player;
use App\Models\Activity;
use App\Models\Bounty;
use App\Models\User;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
        'playersCount' => Player::count(),
        'activityCount' => Activity::count(),
        'bountiesCount' => Bounty::count(),
        'adminsCount' => User::where('is_admin', 1)->count(), // adjust if needed
    ]);
    }
}
