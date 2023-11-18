<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Seccione;

class HomeController extends Controller
{
    /**
     * Constructor del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        // Aplicar el middleware de autenticación a todas las rutas del controlador
        $this->middleware('auth');
    }

    /**
     * Muestra el panel de control de la aplicación.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Retornar la vista 'home'
        return view('home');
    }

    /**
     * Muestra vistas específicas según la solicitud.
     *
     * @param string $view La vista a mostrar.
     *
     * @return \Illuminate\Contracts\Support\Renderable Retorna la vista correspondiente.
     */
    public function views($view)
    {
        // Verificar si la vista solicitada es 'dashboard.users.view'
        if ($view === 'dashboard.users.view') {
            // Obtener datos de usuarios paginados, roles y secciones desde los modelos correspondientes
            $data = User::paginate(100);
            $rol = Role::all();
            $seccion = Seccione::all();
            
            // Definir tipos de documento y departamentos para usar en la vista
            $tiposDocumento = ['Cédula de Ciudadanía', 'Tarjeta de Identidad', 'Cédula de Extranjería', 'Número ciego SENA', 'Pasaporte', 'Documento Nacional de Identificación Pasaporte', 'Número de Identificación Tributaria', 'PEP - RAMV', 'PEP', 'Permiso por Protección Temporal'];
            $departamentos = ['Amazonas', 'Antioquia', 'Arauca', 'Atlántico', 'Bolívar', 'Boyacá', 'Caldas', 'Caquetá', 'Casanare', 'Cauca', 'Cesar', 'Chocó', 'Córdoba', 'Cundinamarca', 'Guainía', 'Guaviare', 'Huila', 'La Guajira', 'Magdalena', 'Meta', 'Nariño', 'Norte de Santander', 'Putumayo', 'Quindío', 'Risaralda', 'San Andrés y Providencia', 'Santander', 'Sucre', 'Tolima', 'Valle del Cauca', 'Vaupés', 'Vichada'];

            // Retornar la vista 'dashboard.users.view' con los datos
            return view($view, compact('data', 'tiposDocumento', 'departamentos', 'rol', 'seccion'));
        } else {
            // Si no es 'dashboard.users.view', simplemente retornar la vista solicitada
            return view($view);
        }
    }
}
