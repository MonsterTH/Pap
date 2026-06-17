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

    public function watch($camera = 1)
    {
        $cameras = [
            1 => [
                'name' => 'Camera 1',
                'location' => 'Cozinha',
                'video' => asset('CameraVideos/Cozinha.mp4'),
            ],
            2 => [
                'name' => 'Camera 2',
                'location' => 'Sala de Estar',
                'video' => asset('CameraVideos/SalaDeEstar.mp4'),
            ],
            3 => [
                'name' => 'Camera 3',
                'location' => 'Exterior 1',
                'video' => asset('CameraVideos/Exterior1.mp4'),
            ],
            4 => [
                'name' => 'Camera 4',
                'location' => 'Exterior 2',
                'video' => asset('CameraVideos/Exterior2.mp4'),
            ],
        ];

        $selectedCamera = $cameras[$camera] ?? $cameras[1];

        return view('watch', compact('cameras', 'selectedCamera'));
    }
}
