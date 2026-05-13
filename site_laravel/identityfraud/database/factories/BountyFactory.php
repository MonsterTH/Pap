<?php

namespace Database\Factories;

use App\Models\Bounty;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player;
/**
 * @extends Factory<Bounty>
 */
class BountyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'player_id' => Player::inRandomOrder()->value('id'),
            'target_id' => Player::inRandomOrder()->value('id'),
            'completed' => $this->faker->boolean(),
        ];
    }
}
