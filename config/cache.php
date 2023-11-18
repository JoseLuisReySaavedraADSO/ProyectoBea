<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Almacenamiento de Caché Predeterminado
    |--------------------------------------------------------------------------
    |
    | Esta opción controla la conexión de caché predeterminada que se utiliza mientras
    | se utiliza esta biblioteca de almacenamiento en caché. Esta conexión se utiliza cuando no se
    | especifica explícitamente otra al ejecutar una función de almacenamiento en caché determinada.
    |
    */

    'default' => env('CACHE_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Almacenes de Caché
    |--------------------------------------------------------------------------
    |
    | Aquí puedes definir todos los "almacenes" de caché para tu aplicación, así como sus controladores.
    | Incluso puedes definir múltiples almacenes para el mismo controlador de caché para agrupar tipos de elementos almacenados en tus cachés.
    |
    | Controladores admitidos: "apc", "array", "database", "file",
    |         "memcached", "redis", "dynamodb", "octane", "null"
    |
    */

    'stores' => [

        'apc' => [
            'driver' => 'apc',
        ],

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'cache',
            'connection' => null,
            'lock_connection' => null,
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'cache',
            'lock_connection' => 'default',
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        'octane' => [
            'driver' => 'octane',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Prefijo de Clave de Caché
    |--------------------------------------------------------------------------
    |
    | Cuando se utilizan los almacenes de caché APC, database, memcached, Redis o DynamoDB,
    | puede haber otras aplicaciones que utilicen la misma caché. Por
    | esa razón, puedes agregar un prefijo a cada clave de caché para evitar colisiones.
    |
    */

    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'),

];
