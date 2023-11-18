<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Servicios de Terceros
    |--------------------------------------------------------------------------
    |
    | Este archivo es para almacenar las credenciales de servicios de terceros
    | como Mailgun, Postmark, AWS y más. Este archivo proporciona la ubicación
    | por defecto para este tipo de información, permitiendo que los paquetes
    | tengan un archivo convencional para localizar las diversas credenciales del servicio.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
