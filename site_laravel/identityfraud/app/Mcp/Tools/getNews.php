<?php

namespace App\Mcp\Tools;

use App\Models\News;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Tool;

#[Description('Obtém notícias com filtros opcionais.')]
class GetNews extends Tool
{
    public function handle(Request $request): Response
    {
        $tag = $request->get('tag');
        $search = $request->get('search');
        $dateMin = $request->get('date_min');
        $dateMax = $request->get('date_max');

        $query = News::with('tags');

        if ($tag) {
            $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('name', $tag);
            });
        }

        if ($search) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($dateMin) {
            $query->whereDate('date', '>=', $dateMin);
        }

        if ($dateMax) {
            $query->whereDate('date', '<=', $dateMax);
        }

        $news = $query
            ->orderBy('date', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'date' => $item->date,
                    'description' => $item->description,
                    'tags' => $item->tags->pluck('name'),
                ];
            });

        return Response::json($news->toArray());
    }

    public function schema(JsonSchema $schema): array
    {
        return [
            'tag' => $schema->string()
                ->description('Filtrar por tag'),

            'search' => $schema->string()
                ->description('Pesquisar por título'),

            'date_min' => $schema->string()
                ->description('Data mínima (YYYY-MM-DD)'),

            'date_max' => $schema->string()
                ->description('Data máxima (YYYY-MM-DD)'),
        ];
    }
}
