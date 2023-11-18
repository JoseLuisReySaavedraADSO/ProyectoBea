<?php

use Laravel\Sanctum\Sanctum;

return [

    /*
    |--------------------------------------------------------------------------
    | Dominios con Estado
    |--------------------------------------------------------------------------
    |
    | Las solicitudes desde los siguientes dominios/anfitriones recibirán cookies
    | de autenticación de API con estado. Normalmente, estos deberían incluir
    | tus dominios locales y de producción que acceden a tu API a través de una SPA frontend.
    |
    */

    'stateful' => explode(',', env('SANCTUM_STATEFUL_DOMAINS', sprintf(
        '%s%s',
        'localhost,localhost:3000,127.0.0.1,127.0.0.1:8000,::1',
        Sanctum::currentApplicationUrlWithPort()
    ))),

    /*
    |--------------------------------------------------------------------------
    | Guardianes de Sanctum
    |--------------------------------------------------------------------------
    |
    | Este array contiene los guardianes de autenticación que se comprobarán cuando
    | Sanctum intente autenticar una solicitud. Si ninguno de estos guardianes
    | es capaz de autenticar la solicitud, Sanctum usará el token de portador
    | presente en una solicitud entrante para la autenticación.
    |
    */

    'guard' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Minutos de Expiración
    |--------------------------------------------------------------------------
    |
    | Este valor controla la cantidad de minutos hasta que un token emitido sea
    | considerado caducado. Si este valor es nulo, los tokens de acceso personal
    | no caducarán. Esto no ajustará la duración de las sesiones de primera parte.
    |
    */

    'expiration' => null,

    /*
    |--------------------------------------------------------------------------
    | Middleware de Sanctum
    |--------------------------------------------------------------------------
    |
    | Al autenticar tu SPA de primera parte con Sanctum, es posible que necesites
    | personalizar algunos de los middleware que Sanctum utiliza al procesar la
    | solicitud. Puedes cambiar el middleware listado a continuación según sea necesario.
    |
    */

    'middleware' => [
        'verify_csrf_token' => App\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => App\Http\Middleware\EncryptCookies::class,
    ],

];
