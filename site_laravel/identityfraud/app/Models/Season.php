<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
   use HasFactory;

   protected $fillable = [
        'name',
        'year',
        'winner_id',
    ];

   public function winner()
    {
        return $this->belongsTo(Player::class, 'winner_id');
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'player_season');
    }
}
