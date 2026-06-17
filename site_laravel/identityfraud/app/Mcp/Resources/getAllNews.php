<?php

namespace App\Mcp\Resources;

use App\Models\News;
use Laravel\Mcp\Request;
use Laravel\Mcp\Response;
use Laravel\Mcp\Server\Attributes\Description;
use Laravel\Mcp\Server\Resource;

#[Description('Retorna todas as notícias cadastradas.')]
class GetAllNews extends Resource
{
    /**
     * Handle the resource request.
     */
    public function handle(Request $request): Response
    {
        $news = News::with('tags')
            ->orderBy('date', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'date' => $item->date,
                    'description' => $item->description,
                    'image' => $item->image,
                    'tags' => $item->tags->pluck('name')->toArray(),
                ];
            });

        return Response::json($news->toArray());
    }
}
