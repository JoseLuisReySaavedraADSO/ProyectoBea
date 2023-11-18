<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Controlador de Sesión Predeterminado
    |--------------------------------------------------------------------------
    |
    | Esta opción controla el controlador de sesión "driver" predeterminado que se utilizará en
    | las solicitudes. Por defecto, se utilizará el controlador nativo ligero, pero
    | puedes especificar cualquiera de los otros maravillosos controladores proporcionados aquí.
    |
    | Compatibles: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Duración de la Sesión
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar el número de minutos que deseas que la sesión
    | se permita permanecer inactiva antes de que expire. Si quieres que
    | expire inmediatamente al cerrar el navegador, establece esa opción.
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => false,

    /*
    |--------------------------------------------------------------------------
    | Encriptación de Sesión
    |--------------------------------------------------------------------------
    |
    | Esta opción te permite especificar fácilmente que todos los datos de tu sesión
    | deben ser encriptados antes de almacenarse. Toda la encriptación se ejecutará
    | automáticamente por Laravel y puedes usar la Sesión como de costumbre.
    |
    */

    'encrypt' => false,

    /*
    |--------------------------------------------------------------------------
    | Ubicación de Archivos de Sesión
    |--------------------------------------------------------------------------
    |
    | Cuando se utiliza el controlador de sesión nativo, necesitamos una ubicación donde
    | se pueden almacenar los archivos de sesión. Se ha establecido uno por defecto,
    | pero se puede especificar una ubicación diferente. Esto solo es necesario para sesiones de archivos.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Conexión de Base de Datos de Sesiones
    |--------------------------------------------------------------------------
    |
    | Cuando se utilizan los controladores de sesión "database" o "redis", puedes especificar una
    | conexión que se debe usar para gestionar estas sesiones. Esto debe
    | corresponder a una conexión en las opciones de configuración de tu base de datos.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Tabla de Base de Datos de Sesiones
    |--------------------------------------------------------------------------
    |
    | Cuando se utiliza el controlador de sesión "database", puedes especificar la tabla que
    | se debe utilizar para gestionar las sesiones. Por supuesto, se proporciona un valor predeterminado
    | sensato, pero eres libre de cambiar esto según sea necesario.
    |
    */

    'table' => 'sessions',

    /*
    |--------------------------------------------------------------------------
    | Almacenamiento en Caché de Sesiones
    |--------------------------------------------------------------------------
    |
    | Mientras utilizas uno de los sistemas de almacenamiento en caché basados en sesiones del framework,
    | puedes listar una tienda de caché que se debe usar para estas sesiones. Este valor
    | debe coincidir con una de las tiendas de caché configuradas en la aplicación.
    |
    | Afecta a: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Sorteo de Limpieza de Sesiones
    |--------------------------------------------------------------------------
    |
    | Algunos controladores de sesión deben limpiar manualmente su ubicación de almacenamiento para eliminar
    | sesiones antiguas. Aquí están las probabilidades de que suceda en una solicitud dada.
    | Por defecto, las probabilidades son de 2 de 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Nombre de Cookie de Sesión
    |--------------------------------------------------------------------------
    |
    | Aquí puedes cambiar el nombre de la cookie utilizada para identificar una sesión
    | por ID. El nombre especificado aquí se utilizará cada vez que se cree una
    | nueva cookie de sesión por el framework para cada controlador.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Ruta de Cookie de Sesión
    |--------------------------------------------------------------------------
    |
    | La ruta de la cookie de sesión determina la ruta para la cual la cookie será
    | considerada disponible. Normalmente, esto será la ruta raíz de
    | tu aplicación, pero eres libre de cambiar esto cuando sea necesario.
    |
    */

    'path' => '/',

    /*
    |--------------------------------------------------------------------------
    | Dominio de Cookie de Sesión
    |--------------------------------------------------------------------------
    |
    | Aquí puedes cambiar el dominio de la cookie utilizada para identificar una sesión
    | en tu aplicación. Esto determinará en qué dominios estará disponible la cookie
    | en tu aplicación. Se ha establecido un valor predeterminado sensato.
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Solo Cookies Seguras (HTTPS)
    |--------------------------------------------------------------------------
    |
    | Al establecer esta opción en true, las cookies de sesión solo se enviarán de vuelta
    | al servidor si el navegador tiene una conexión HTTPS. Esto evitará
    | que la cookie se envíe si no se puede hacer de manera segura.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | Solo Acceso HTTP
    |--------------------------------------------------------------------------
    |
    | Al establecer este valor en true, se evitará que JavaScript acceda al
    | valor de la cookie y la cookie solo será accesible a través de
    | el protocolo HTTP. Eres libre de modificar esta opción si es necesario.
    |
    */

    'http_only' => true,

    /*
    |--------------------------------------------------------------------------
    | Cookies Same-Site
    |--------------------------------------------------------------------------
    |
    | Esta opción determina cómo se comportan tus cookies cuando se realizan solicitudes
    | entre sitios y se puede usar para mitigar ataques CSRF. Por defecto, estableceremos
    | este valor en "lax" ya que es un valor predeterminado seguro.
    |
    | Compatibles: "lax", "strict", "none", null
    |
    */

    'same_site' => 'lax',

];
