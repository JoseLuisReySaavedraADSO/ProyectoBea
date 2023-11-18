<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuración de Cross-Origin Resource Sharing (CORS)
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar tus ajustes para el intercambio de recursos entre dominios
    | o "CORS". Esto determina qué operaciones entre dominios pueden ejecutarse
    | en navegadores web. Eres libre de ajustar estas configuraciones según sea necesario.
    |
    | Para obtener más información: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
