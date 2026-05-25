<?php

namespace Database\Factories;

use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
/**
 * @extends Factory<Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    static $used = [];

    do {
        $postId = Post::inRandomOrder()->first()->id;
        $userId = User::inRandomOrder()->first()->id;
        $key = "{$postId}-{$userId}";
    } while (in_array($key, $used));

    $used[] = $key;

    return [
        'post_id' => $postId,
        'user_id' => $userId,
    ];
}
}
