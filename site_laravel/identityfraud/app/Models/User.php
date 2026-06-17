<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Eviction;
use App\Models\Administrador;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;


#[Fillable(['name', 'email', 'password', 'email_verified_at', 'profile_picture', 'is_admin', 'has_2fa', 'two_factor_code', 'two_factor_expires_at', 'google_id'])]
#[Hidden(['password'/*, 'two_factor_secret', 'two_factor_recovery_codes'*/, 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new class extends VerifyEmail {
            protected function buildMailMessage($url)
            {
                return (new MailMessage)
                    ->subject('Verificação de email - IdentityFraud')
                    ->greeting('Ola!')
                    ->line('Porfavor clique no butão abaixo para confirmar o seu email!')
                    ->action('Confirmar Email', $url)
                    ->line('Se nao criaste uma conta, ignora este email')
                    ->salutation('Comprimentos, IdentityFraud');
            }
        });
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }

    public function evictions()
    {
        return $this->hasMany(Eviction::class, 'user_id', 'id');
    }

    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }
}
