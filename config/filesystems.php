<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Disco de Sistema de Archivos Predeterminado
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar el disco de sistema de archivos predeterminado que debería ser utilizado
    | por el framework. El disco "local", así como una variedad de discos basados en la nube,
    | están disponibles para tu aplicación. ¡Solo almacena!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Discos de Sistema de Archivos
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar tantos "discos" de sistema de archivos como desees, e incluso puedes
    | configurar varios discos del mismo controlador. Los valores predeterminados se han
    | establecido para cada controlador como un ejemplo de los valores requeridos.
    |
    | Controladores Soportados: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Enlaces Simbólicos
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar los enlaces simbólicos que se crearán cuando el
    | comando Artisan `storage:link` sea ejecutado. Las claves del array deben ser
    | las ubicaciones de los enlaces y los valores deben ser sus destinos.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
