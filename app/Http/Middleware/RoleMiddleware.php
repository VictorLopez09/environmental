<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            $userRole = Auth::user()->name;

            // Si el rol del usuario está en la lista de roles permitidos, permite el acceso
            if (in_array($userRole, $roles)) {
                return $next($request);
            }
        }

        // Redirigir si no tiene el rol permitido
        return redirect()->route('dashboard')->with('error', 'No tienes acceso a esta sección.');
    }
}
