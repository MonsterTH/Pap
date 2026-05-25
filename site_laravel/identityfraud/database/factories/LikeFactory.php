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
        $postId = Post::inRandomOrder()->first()->id;
        $userId = User::inRandomOrder()->first()->id;

        // retry until unique combo found
        while (
            DB::table('post_likes')
                ->where('post_id', $postId)
                ->where('user_id', $userId)
                ->exists()
        ) {
            $postId = Post::inRandomOrder()->first()->id;
            $userId = User::inRandomOrder()->first()->id;
        }

        return [
            'post_id' => $postId,
            'user_id' => $userId,
        ];
    }
}
