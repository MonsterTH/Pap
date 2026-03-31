<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['email', 'username', 'password', 'photo', 'creation'])]
#[Hidden(['password'])]
class Administrador extends Model
{
    use HasFactory;
}
