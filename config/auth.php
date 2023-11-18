<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configuración Predeterminada de Autenticación
    |--------------------------------------------------------------------------
    |
    | Esta opción controla la "guardia" de autenticación predeterminada y las opciones de restablecimiento de contraseña
    | para tu aplicación. Puedes cambiar estos valores predeterminados
    | según sea necesario, pero son un inicio perfecto para la mayoría de las aplicaciones.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Guardias de Autenticación
    |--------------------------------------------------------------------------
    |
    | A continuación, puedes definir cada guardia de autenticación para tu aplicación.
    | Por supuesto, aquí se ha definido una gran configuración predeterminada para ti
    | que utiliza el almacenamiento de sesión y el proveedor de usuarios Eloquent.
    |
    | Todos los controladores de autenticación tienen un proveedor de usuarios. Esto define cómo
    | los usuarios se recuperan realmente de tu base de datos u otros métodos de almacenamiento
    | utilizados por esta aplicación para persistir los datos de tus usuarios.
    |
    | Soportado: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Proveedores de Usuarios
    |--------------------------------------------------------------------------
    |
    | Todos los controladores de autenticación tienen un proveedor de usuarios. Esto define cómo
    | los usuarios se recuperan realmente de tu base de datos u otros métodos de almacenamiento
    | utilizados por esta aplicación para persistir los datos de tus usuarios.
    |
    | Si tienes varias tablas o modelos de usuario, puedes configurar múltiples
    | fuentes que representen cada modelo/tabla. Luego, estas fuentes pueden
    | asignarse a cualquier guardia de autenticación adicional que hayas definido.
    |
    | Soportado: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Restablecimiento de Contraseñas
    |--------------------------------------------------------------------------
    |
    | Puedes especificar varias configuraciones de restablecimiento de contraseña si tienes más
    | de una tabla o modelo de usuario en la aplicación y deseas tener
    | configuraciones de restablecimiento de contraseña separadas según los tipos de usuario específicos.
    |
    | El tiempo de vencimiento es la cantidad de minutos que cada token de restablecimiento será
    | considerado válido. Esta característica de seguridad mantiene los tokens de corta duración
    | para que tengan menos tiempo para ser adivinados. Puedes cambiar esto según sea necesario.
    |
    | La configuración de throttle es la cantidad de segundos que un usuario debe esperar antes de
    | generar más tokens de restablecimiento de contraseña. Esto evita que el usuario
    | genere rápidamente una gran cantidad de tokens de restablecimiento de contraseña.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Tiempo de Expiración de Confirmación de Contraseña
    |--------------------------------------------------------------------------
    |
    | Aquí puedes definir la cantidad de segundos antes de que expire una confirmación de contraseña
    | y el usuario debe volver a ingresar su contraseña a través de la pantalla de confirmación. De forma predeterminada, el tiempo de espera es de tres horas.
    |
    */

    'password_timeout' => 10800,

];
