<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Rutas de Almacenamiento de Vistas
    |--------------------------------------------------------------------------
    |
    | La mayoría de los sistemas de plantillas cargan plantillas desde el disco. Aquí puedes especificar
    | una matriz de rutas que se deben verificar para tus vistas. Por supuesto,
    | la ruta de vista Laravel habitual ya ha sido registrada para ti.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Ruta de Vistas Compiladas
    |--------------------------------------------------------------------------
    |
    | Esta opción determina dónde se almacenarán todas las plantillas Blade compiladas
    | para tu aplicación. Normalmente, esto está dentro del directorio storage
    | Sin embargo, como de costumbre, eres libre de cambiar este valor.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
