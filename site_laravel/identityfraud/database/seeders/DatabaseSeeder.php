<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Player;
use App\Models\Activity;
use App\Models\Administrador;
use App\Models\Bounty;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Support\Facades\Hash;
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
        Administrador::factory(5)->create();

        Administrador::factory()->create([
            'email' => 'admin@admin.com',
            'username' => 'Admin',
            'password' => Hash::make('admin123'),
            'photo' => null,
            'creation' => now(),
        ]);

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
