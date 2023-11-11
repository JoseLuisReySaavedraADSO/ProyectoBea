<?php

namespace App\Http\Controllers;

use App\Models\Seccione;
use App\Models\Tema;
use App\Models\TemaTeoriaPractica;
use App\Models\User;
use Illuminate\Http\Request;

class SeccionesController extends Controller
{
  public function __invoke($action, $id = null)
  {
    switch ($action) {
      case 'create':
        return $this->create(request());
      case 'edit':
        return $this->edit($id);
      case 'update':
        return $this->update(request(), $id);
      case 'delete':
        return $this->delete($id);
      default:
        return response()->json(['error' => 'Acción no válida'], 400);
    }
  }
  
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $secciones = Seccione::with('tema')->get();
    return view('logged/sections', compact('secciones'));
  }


  public function tema($id)
  {
    $temas = Tema::findOrFail($id);
    // $contenido = TemaTeoriaPractica::where('id_tema_fk', $id)->get();
    $contenido = TemaTeoriaPractica::with('teoria', 'imagen', 'practica')
      ->where('id_tema_fk', $id)
      ->get();

    // $contenido = $temas::with('TemaTeoriaPractica')->get(); 
    // dd($contenido);
    return view('logged/temas', compact('contenido'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function create(Request $request)
  {
    $request->validate(
      [
        'titulo_seccion' => 'required|max:250',
      ],
      [
        'titulo_seccion.required' => 'El Título es obligatorio.',
        'titulo_seccion.max' => 'El título no debe superar los 250 caracteres.',
      ]
    );

    $data = [
      'titulo_seccion' => $request->input('titulo_seccion'),
    ];

    Seccione::create($data);

    return redirect()->route('dashboardAction', ['action' => 'secciones'])->with('success', 'Sección agregada exitosamente');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {
    $secciones = Seccione::all();
    $seccionId = Seccione::findOrFail($id);

    return view('dashboard/secciones/edit', compact('seccionId', 'secciones'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $data, $id)
  {
    $rules = [
      'titulo_seccion' => 'required|max:250',
    ];

    // Mensajes de error personalizados
    $messages = [
      'name.required' => 'El Titulo es obligatorio.',
      'name.max' => 'El nombre no debe superar los 250 caracteres.',
    ];

    // Valida los datos de entrada con las reglas definidas
    $this->validate($data, $rules, $messages);

    // Buscar la seccion por su ID
    $seccion = Seccione::findOrFail($id);

    // Actualizar los campos de la campo utilizando los valores del formulario
    $seccion->update([
      'titulo_seccion' => $data->input('titulo_seccion'),
    ]);

    return redirect()->route('dashboardAction', ['action' => 'secciones'])->with('success', 'Seccion actualizada exitosamente');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function delete($id)
  {
    // Buscar la campo por su ID
    $seccion = Seccione::findOrFail($id);

    // Eliminar la campo
    $seccion->delete();

    return redirect()->route('dashboardAction', ['action' => 'secciones'])->with('success', 'Seccion eliminada exitosamente');
  }
}
