<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Transmisor Predeterminado
    |--------------------------------------------------------------------------
    |
    | Esta opción controla el transmisor predeterminado que utilizará
    | el framework cuando un evento deba ser transmitido. Puedes establecer esto en
    | cualquiera de las conexiones definidas en el array "connections" a continuación.
    |
    | Soportado: "pusher", "ably", "redis", "log", "null"
    |
    */

    'default' => env('BROADCAST_DRIVER', 'null'),

    /*
    |--------------------------------------------------------------------------
    | Conexiones de Transmisión
    |--------------------------------------------------------------------------
    |
    | Aquí puedes definir todas las conexiones de transmisión que se utilizarán
    | para transmitir eventos a otros sistemas o a través de websockets. Se proporcionan ejemplos de
    | cada tipo de conexión disponible dentro de este array.
    |
    */

    'connections' => [

        'pusher' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'host' => env('PUSHER_HOST') ?: 'api-'.env('PUSHER_APP_CLUSTER', 'mt1').'.pusher.com',
                'port' => env('PUSHER_PORT', 443),
                'scheme' => env('PUSHER_SCHEME', 'https'),
                'encrypted' => true,
                'useTLS' => env('PUSHER_SCHEME', 'https') === 'https',
            ],
            'client_options' => [
                // Opciones del cliente Guzzle: https://docs.guzzlephp.org/en/stable/request-options.html
            ],
        ],

        'ably' => [
            'driver' => 'ably',
            'key' => env('ABLY_KEY'),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],

    ],

];
