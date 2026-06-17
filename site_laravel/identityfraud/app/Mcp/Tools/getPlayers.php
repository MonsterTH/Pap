<?php

namespace App\Mcp\Tools;

use App\Models\Player;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tool;

#[Description('Lista jogadores com filtros opcionais.')]
class getPlayers extends Tool
{
    /**
     * Handle the tool request.
     */
    public function handle(Request $request): Response
    {
        $args = $request->all();

        $query = Player::query()
            ->withCount([
                'wonSeasons',
                'bounties',
                'activities',
            ]);

        if (!empty($args['name'])) {
            $query->where('name', 'like', "%{$args['name']}%");
        }

        if (!empty($args['min_activities'])) {
            $query->having('activities_count', '>=', $args['min_activities']);
        }

        if (!empty($args['min_seasons'])) {
            $query->having('won_seasons_count', '>=', $args['min_seasons']);
        }

        if (!empty($args['min_bounties'])) {
            $query->having('bounties_count', '>=', $args['min_bounties']);
        }

        if (!empty($args['max_activities'])) {
            $query->having('activities_count', '<=', $args['max_activities']);
        }

        if (!empty($args['max_seasons'])) {
            $query->having('won_seasons_count', '<=', $args['max_seasons']);
        }

        if (!empty($args['max_bounties'])) {
            $query->having('bounties_count', '<=', $args['max_bounties']);
        }

        return Response::json(
            $query->get()->map(fn ($player) => [
                'id' => $player->id,
                'name' => $player->name,
                'birth_date' => $player->birth_date,
                'won_seasons' => $player->won_seasons_count,
                'bounties' => $player->bounties_count,
                'activities' => $player->activities_count,
            ])
        );
    }

    /**
     * Get the tool's input schema.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'name' => $schema->string()
                ->description('Filtrar por nome'),

            'min_activities' => $schema->integer()
                ->description('Número mínimo de atividades ganhas'),

            'min_seasons' => $schema->integer()
                ->description('Número mínimo de temporadas ganhas'),

            'min_bounties' => $schema->integer()
                ->description('Número mínimo de bounties concluídas'),

            'min_news' => $schema->integer()
                ->description('Número mínimo de notícias associadas'),

            'max_activities' => $schema->integer()
                ->description('Número máximo de atividades ganhas'),

            'max_seasons' => $schema->integer()
                ->description('Número máximo de temporadas ganhas'),

            'max_bounties' => $schema->integer()
                ->description('Número máximo de bounties concluídas'),
        ];
    }
}
