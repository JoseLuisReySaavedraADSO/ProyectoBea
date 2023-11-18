<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nombre Predeterminado de la Conexión de Cola
    |--------------------------------------------------------------------------
    |
    | La API de colas de Laravel admite una variedad de back-ends a través de una
    | sola API, dándote acceso conveniente a cada back-end utilizando la misma
    | sintaxis para cada uno. Aquí puedes definir una conexión predeterminada.
    |
    */

    'default' => env('QUEUE_CONNECTION', 'sync'),

    /*
    |--------------------------------------------------------------------------
    | Conexiones de Cola
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar la información de conexión para cada servidor que
    | es utilizado por tu aplicación. Se ha agregado una configuración predeterminada
    | para cada back-end incluido con Laravel. Eres libre de agregar más.
    |
    | Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90,
            'after_commit' => false,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'localhost',
            'queue' => 'default',
            'retry_after' => 90,
            'block_for' => 0,
            'after_commit' => false,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
            'queue' => env('SQS_QUEUE', 'default'),
            'suffix' => env('SQS_SUFFIX'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'after_commit' => false,
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
            'queue' => env('REDIS_QUEUE', 'default'),
            'retry_after' => 90,
            'block_for' => null,
            'after_commit' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Agrupación de Trabajos (Job Batching)
    |--------------------------------------------------------------------------
    |
    | Las siguientes opciones configuran la base de datos y la tabla que almacenan
    | la información de agrupación de trabajos. Estas opciones pueden actualizarse
    | a cualquier conexión de base de datos y tabla definidas por tu aplicación.
    |
    */

    'batching' => [
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'job_batches',
    ],

    /*
    |--------------------------------------------------------------------------
    | Trabajos de Cola Fallidos
    |--------------------------------------------------------------------------
    |
    | Estas opciones configuran el comportamiento del registro de trabajos de cola
    | fallidos para que puedas controlar qué base de datos y tabla se utilizan
    | para almacenar los trabajos que han fallado. Puedes cambiarlos a cualquier
    | base de datos / tabla que desees.
    |
    */

    'failed' => [
        'driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'),
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs',
    ],

];
