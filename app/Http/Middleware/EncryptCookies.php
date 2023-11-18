<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * Los nombres de las cookies que no deben ser cifradas.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Puedes agregar los nombres de las cookies que no quieres cifrar en esta lista.
    ];
}
