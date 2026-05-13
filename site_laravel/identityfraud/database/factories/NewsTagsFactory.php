<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\NewsTags;
use App\Models\Tags;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<NewsTags>
 */
class NewsTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tag_id' => Tags::inRandomOrder()->value('id'),
            'news_id' => News::inRandomOrder()->value('id'),
        ];
    }
}
