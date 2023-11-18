<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            // Verifica si el usuario está autenticado en el guard especificado
            if (Auth::guard($guard)->check()) {
                // Redirige al inicio del RouteServiceProvider si el usuario está autenticado
                return redirect(RouteServiceProvider::HOME);
            }
        }

        // Continúa con la solicitud si el usuario no está autenticado
        return $next($request);
    }
}
