<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Verifica se existe um usuário logado e se ele é admin
        if (!$user || !$user->is_admin) {
            abort(403, 'Acesso não autorizado'); // Bloqueia o acesso
        }

        return $next($request);
    }
}
