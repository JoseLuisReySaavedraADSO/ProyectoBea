<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Controlador de Hash Predeterminado
    |--------------------------------------------------------------------------
    |
    | Esta opción controla el controlador de hash predeterminado que se utilizará para el hash
    | de contraseñas para tu aplicación. Por defecto, se utiliza el algoritmo bcrypt;
    | sin embargo, puedes modificar esta opción si lo deseas.
    |
    | Soportados: "bcrypt", "argon", "argon2id"
    |
    */

    'driver' => 'bcrypt',

    /*
    |--------------------------------------------------------------------------
    | Opciones de Bcrypt
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar las opciones de configuración que se deben utilizar cuando
    | las contraseñas se hashan utilizando el algoritmo Bcrypt. Esto te permitirá
    | controlar la cantidad de tiempo que tarda en hashearse la contraseña dada.
    |
    */

    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 10),
    ],

    /*
    |--------------------------------------------------------------------------
    | Opciones de Argon
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar las opciones de configuración que se deben utilizar cuando
    | las contraseñas se hashan utilizando el algoritmo Argon. Esto te permitirá
    | controlar la cantidad de tiempo que tarda en hashearse la contraseña dada.
    |
    */

    'argon' => [
        'memory' => 65536,
        'threads' => 1,
        'time' => 4,
    ],

];
