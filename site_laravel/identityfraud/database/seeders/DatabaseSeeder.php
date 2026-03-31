<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Player;
use App\Models\Activity;
use App\Models\Bounty;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\News;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        Player::factory(16)->create();
        Activity::factory(6)->create();
        Bounty::factory(3)->create();
        Post::factory(1)->create();
        Like::factory(1600)->create();
        Comment::factory(80)->create();
        News::factory(16)->create();

        User::factory()->create([
            'name' => 'Francisco Yang',
            'email' => 'yang@francisco.com',
        ]);

        User::factory()->create([
            'name' => 'Guilherme Madeira',
            'email' => 'madeira@guilherme.com',
        ]);
    }
}
