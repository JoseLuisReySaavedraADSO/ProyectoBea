<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->id_rol_fk === 1) {
            return $next($request);
        }

        return redirect('/'); // Puedes redirigir a la página que desees si el usuario no cumple con los requisitos.
    }
}
