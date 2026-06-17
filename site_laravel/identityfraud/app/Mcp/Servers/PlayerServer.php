<?php

namespace App\Mcp\Servers;

use Laravel\Mcp\Server;
use Laravel\Mcp\Server\Attributes\Instructions;
use Laravel\Mcp\Server\Attributes\Name;
use Laravel\Mcp\Server\Attributes\Version;
use App\Mcp\Tools\getPlayers;
use App\Mcp\Resources\getAllPlayers;

#[Name('Player Server')]
#[Version('0.0.1')]
#[Instructions('Instructions describing how to use the server and its features.')]
class PlayerServer extends Server
{
    protected array $tools = [
        getPlayers::class,
    ];

    protected array $resources = [
        getAllPlayers::class,
    ];

    protected array $prompts = [
        //
    ];
}
