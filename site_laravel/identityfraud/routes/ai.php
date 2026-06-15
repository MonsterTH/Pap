<?php

use App\Mcp\Servers\PlayerServer;
use Laravel\Mcp\Facades\Mcp;

Mcp::web('/mcp/PlayerServer', PlayerServer::class);
