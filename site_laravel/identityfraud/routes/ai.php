<?php

use App\Mcp\Servers\PlayerServer;
use Laravel\Mcp\Facades\Mcp;
use App\Mcp\Servers\NewsServer;

Mcp::web('/mcp/PlayerServer', PlayerServer::class);

Mcp::web('/mcp/NewsServer', NewsServer::class);
