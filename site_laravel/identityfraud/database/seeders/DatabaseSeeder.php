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
        Post::factory(16)->create();
        Like::factory(16)->create();
        Comment::factory(16)->create();
        News::factory(16)->create();

        User::factory()->create([
            'name' => 'Francisco Yang',
<<<<<<< HEAD:site_laravel/identityflaud/database/seeders/DatabaseSeeder.php
            'email' => 'Yang@Francisco.com',
        ]);

        User::factory()->create([
            'name' => 'Guilherme Madeira',
            'email' => 'Madeira@Guilherme.com',
=======
            'email' => 'yang@gmail.com',
>>>>>>> 8bb3858de5ab7fd82c4cfb64d550762a7347691e:site_laravel/identityfraud/database/seeders/DatabaseSeeder.php
        ]);
    }
}
