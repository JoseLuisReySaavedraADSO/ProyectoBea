<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Nombre de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Este valor es el nombre de tu aplicación. Se utiliza cuando el
    | marco necesita colocar el nombre de la aplicación en una notificación o
    | en cualquier otra ubicación según sea necesario por la aplicación o sus paquetes.
    |
    */

    'name' => env('APP_NAME', 'Bea'),

    /*
    |--------------------------------------------------------------------------
    | Entorno de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Este valor determina el "entorno" en el que se está ejecutando tu aplicación.
    | Esto puede determinar cómo prefieres configurar varios
    | servicios que utiliza la aplicación. Establece esto en tu archivo ".env".
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Modo de Depuración de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Cuando tu aplicación está en modo de depuración, se mostrarán mensajes de error detallados con
    | trazas de pila en cada error que ocurra dentro de tu
    | aplicación. Si está desactivado, se mostrará una página de error genérica.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Esta URL se utiliza para que la consola genere URLs correctamente al usar
    | la herramienta de línea de comandos Artisan. Deberías establecer esto en la raíz de
    | tu aplicación para que se utilice al ejecutar tareas de Artisan.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Zona Horaria de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar la zona horaria predeterminada para tu aplicación, que
    | se utilizará en las funciones de fecha y hora de PHP. Ya hemos establecido
    | esto en un valor sensato para ti.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Configuración de Idioma Local de la Aplicación
    |--------------------------------------------------------------------------
    |
    | El idioma local de la aplicación determina el idioma predeterminado que se utilizará
    | por el proveedor de servicios de traducción. Eres libre de establecer este valor
    | a cualquiera de los locales que admitirá la aplicación.
    |
    */

    'locale' => 'es',

    /*
    |--------------------------------------------------------------------------
    | Idioma Local de Respaldo de la Aplicación
    |--------------------------------------------------------------------------
    |
    | El idioma local de respaldo determina el idioma que se utilizará cuando el actual
    | no esté disponible. Puedes cambiar el valor para que coincida con cualquiera de los
    | directorios de idiomas que proporciona tu aplicación.
    |
    */

    'fallback_locale' => 'es',

    /*
    |--------------------------------------------------------------------------
    | Idioma Local de Faker
    |--------------------------------------------------------------------------
    |
    | Este idioma se utilizará en la biblioteca Faker de PHP al generar datos ficticios
    | para las semillas de tu base de datos. Por ejemplo, esto se usará para obtener
    | números de teléfono localizados, información de direcciones, etc.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Clave de Encriptación
    |--------------------------------------------------------------------------
    |
    | Esta clave es utilizada por el servicio de encriptación Illuminate y debe establecerse
    | en una cadena aleatoria de 32 caracteres, de lo contrario, estas cadenas encriptadas
    | no serán seguras. ¡Por favor, haz esto antes de implementar la aplicación!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Controlador del Modo de Mantenimiento
    |--------------------------------------------------------------------------
    |
    | Estas opciones de configuración determinan el controlador utilizado para determinar y
    | gestionar el estado de "modo de mantenimiento" de Laravel. El controlador "cache" permitirá
    | que el modo de mantenimiento se controle en varias máquinas.
    |
    | Controladores admitidos: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store'  => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Proveedores de Servicios Cargados Automáticamente
    |--------------------------------------------------------------------------
    |
    | Los proveedores de servicios enumerados aquí se cargarán automáticamente en la
    | solicitud de tu aplicación. Siéntete libre de agregar tus propios servicios a
    | esta matriz para otorgar funcionalidad ampliada a tu aplicación.
    |
    */

    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Proveedores de Servicios de Paquetes...
         */

        /*
         * Proveedores de Servicios de la Aplicación...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Alias de Clases
    |--------------------------------------------------------------------------
    |
    | Esta matriz de alias de clase se registrará cuando se inicie esta aplicación
    | ya que los alias se cargan "perezosamente", por lo que no obstaculizan el rendimiento.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),

];
