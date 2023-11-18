<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
{
    /**
     * Maneja la solicitud entrante.
     *
     * Verifica si el usuario está autenticado y tiene el rol administrador.
     * Si cumple con los requisitos, permite la solicitud. De lo contrario, redirige a la página principal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Verifica si el usuario está autenticado y tiene el rol con ID 1 (o el valor que represente el rol necesario).
        if (auth()->check() && auth()->user()->id_rol_fk === 1) {
            // Si cumple con los requisitos, permite la solicitud.
            return $next($request);
        }

        // Si el usuario no cumple con los requisitos, redirige a la página principal (puedes cambiar la ruta según tus necesidades).
        return redirect('/');
    }
}
