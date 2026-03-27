<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bounty extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'target_id',
        'completed',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function target()
    {
        return $this->belongsTo(Player::class, 'target_id');
    }
}
