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
        Post::factory(20)->create();
        Like::factory(20)->create();
        Comment::factory(80)->create();
        News::factory(16)->create();

        User::factory()->create([
            'email' => 'admin@admin.com',
            'name' => 'Admin',
            'password' => Hash::make('admin123'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Francisco Yang',
            'email' => 'yang@francisco.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Guilherme Madeira',
            'email' => 'madeira@guilherme.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);
    }
}
