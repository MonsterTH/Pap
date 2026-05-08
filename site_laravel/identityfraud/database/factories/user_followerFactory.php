<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\User;
use App\Models\user_follower;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<user_follower>
 */
class user_followerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('id'),
            'follower_id' => User::inRandomOrder()->value('id'),
        ];
    }
}
