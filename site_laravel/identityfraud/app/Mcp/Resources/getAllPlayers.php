<?php

namespace App\Mcp\Resources;

use App\Models\Player;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Resource;

#[Description('Lista todos os participantes registados.')]
class GetAllPlayers extends Resource
{
    /**
     * Handle the resource request.
     */
    public function handle(Request $request): Response
    {
        $players = Player::withCount([
            'wonSeasons',
            'bounties',
            'activities',
        ])->get();

        return Response::json(
            $players->map(fn ($player) => [
                'id' => $player->id,
                'name' => $player->name,
                'about' => $player->about,
                'won_seasons' => $player->won_seasons_count,
                'bounties' => $player->bounties_count,
                'activities' => $player->activities_count,
            ])
        );
    }
}
