<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function views($view)
    {
        if ($view === 'dashboard.users.view') { 
            $data = User::paginate(100);
            $tiposDocumento = ['Cédula de Ciudadanía','Tarjeta de Identidad','Cédula de Extranjería','Número ciego SENA','Pasaporte','Documento Nacional de Identificación Pasaporte','Número de Identificación Tributaria','PEP - RAMV','PEP','Permiso por Protección Temporal',];
            $departamentos = ['Amazonas','Antioquia','Arauca','Atlántico','Bolívar','Boyacá','Caldas','Caquetá','Casanare','Cauca','Cesar','Chocó','Córdoba','Cundinamarca','Guainía','Guaviare','Huila','La Guajira','Magdalena','Meta','Nariño','Norte de Santander','Putumayo','Quindío','Risaralda','San Andrés y Providencia','Santander','Sucre','Tolima','Valle del Cauca','Vaupés','Vichada',];

            return view($view, compact('data', 'tiposDocumento', 'departamentos'));

        }else{
            return view($view);
        }
    }
}
