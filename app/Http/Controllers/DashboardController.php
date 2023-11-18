<?php

namespace App\Http\Controllers;

use App\Models\Seccione;
use App\Models\Tema;
use App\Models\TemaTeoriaPractica;

/**
 * Controlador para gestionar las acciones del panel de control.
 *
 * Este controlador maneja las operaciones relacionadas con las secciones, temas y teorías en el panel de control.
 * Se encarga de dirigir las solicitudes a las funciones correspondientes para cada acción.
 *
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
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
   * Maneja las solicitudes de rutas dinámicas en el panel de control.
   *
   * @param string $action La acción solicitada ('secciones', 'temas', 'teorias').
   * @param int|null $id (Opcional) Identificador asociado a la acción.
   * @return |La vista correspondiente a la acción solicitada.
   */
  public function __invoke($action, $id = null)
  {
    switch ($action) {
      case 'secciones':
        return $this->secciones();
      case 'temas':
        return $this->temas();
      case 'teorias':
        return $this->teorias();
    }
  }

  /**
   * Muestra la vista de secciones en el panel de control.
   *
   * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory La vista 'dashboard/secciones/secciones'.
   */
  public function secciones()
  {
    // Obtener todas las secciones desde el modelo Seccione
    $secciones = Seccione::all();

    // Retornar la vista 'dashboard/secciones/secciones' con las secciones
    return view('dashboard/secciones/secciones', compact('secciones'));
  }

  /**
   * Muestra la vista de temas en el panel de control.
   *
   * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory La vista 'dashboard/temas/temas'.
   */
  public function temas()
  {
    // Obtener todas las secciones desde el modelo Seccione
    $secciones = Seccione::all();

    // Obtener todos los temas desde el modelo Tema
    $temas = Tema::all();

    // Retornar la vista 'dashboard/temas/temas' con las secciones y temas
    return view('dashboard/temas/temas', compact('temas', 'secciones'));
  }

  /**
   * Muestra la vista de teorías en el panel de control.
   *
   * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory La vista 'dashboard/teorias/teorias'.
   */
  public function teorias()
  {
    // Obtener todas las teorías desde el modelo TemaTeoriaPractica
    $teorias = TemaTeoriaPractica::all();

    // Obtener todos los temas desde el modelo Tema
    $temas = Tema::all();

    // Retornar la vista 'dashboard/teorias/teorias' con las teorías y temas
    return view('dashboard/teorias/teorias', compact('teorias', 'temas'));
  }
}
