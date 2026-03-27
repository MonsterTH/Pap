<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eviction extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'id_voter',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_voter', 'id');
    }
}
