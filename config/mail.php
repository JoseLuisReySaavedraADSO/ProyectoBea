<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Mailer Predeterminado
    |--------------------------------------------------------------------------
    |
    | Esta opción controla el mailer predeterminado que se utiliza para enviar
    | cualquier mensaje de correo electrónico enviado por tu aplicación.
    | Mailers alternativos pueden configurarse y utilizarse según sea necesario;
    | sin embargo, este mailer se utilizará de forma predeterminada.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | Configuraciones del Mailer
    |--------------------------------------------------------------------------
    |
    | Aquí puedes configurar todos los mailers utilizados por tu aplicación,
    | junto con sus respectivas configuraciones. Se han proporcionado varios
    | ejemplos y puedes agregar los tuyos propios según las necesidades de tu aplicación.
    |
    | Laravel admite una variedad de "transport" drivers para enviar correos.
    | Especificarás cuál estás utilizando para tus mailers a continuación.
    | Puedes agregar mailers adicionales según sea necesario.
    |
    | Soportados: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "log", "array", "failover"
    |
    */

    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'mailgun' => [
            'transport' => 'mailgun',
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Dirección Global "From"
    |--------------------------------------------------------------------------
    |
    | Puedes desear que todos los correos electrónicos enviados por tu aplicación
    | se envíen desde la misma dirección. Aquí puedes especificar un nombre y una
    | dirección que se utilicen globalmente para todos los correos electrónicos
    | enviados por tu aplicación.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuraciones de Correo Electrónico con Markdown
    |--------------------------------------------------------------------------
    |
    | Si estás utilizando el renderizado de correo electrónico basado en Markdown,
    | puedes configurar aquí tu tema y las rutas de los componentes, lo que te permite
    | personalizar el diseño de los correos electrónicos. ¡O simplemente puedes
    | quedarte con los valores predeterminados de Laravel!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
