<?php

namespace App\Mcp\Servers;

use Laravel\Mcp\Server;
use Laravel\Mcp\Server\Attributes\Instructions;
use Laravel\Mcp\Server\Attributes\Name;
use Laravel\Mcp\Server\Attributes\Version;
use App\Mcp\Tools\getNews;
use App\Mcp\Resources\getAllNews;


#[Name('News Server')]
#[Version('0.0.1')]
#[Instructions('Instructions describing how to use the server and its features.')]
class NewsServer extends Server
{
    protected array $tools = [
        getNews::class,
    ];

    protected array $resources = [
        getAllNews::class,
    ];

    protected array $prompts = [
        //
    ];
}
