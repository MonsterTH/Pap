<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Administrador;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || !Administrador::where('email', $user->email)->exists()) {
            abort(403, 'Acesso não autorizado');
        }

        return $next($request);
    }
}
