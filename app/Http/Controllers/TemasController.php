<?php

namespace App\Http\Controllers;

use App\Models\Seccione;
use App\Models\Tema;
use App\Models\TemaTeoriaPractica;
use App\Models\User;
use Illuminate\Http\Request;

class TemasController extends Controller
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
      case 'visibilidad':
        return $this->visibilidad(request(), $id);
      default:
        return response()->json(['error' => 'Acción no válida'], 400);
    }
  }
  /**
   * Display a listing of the resource.
   */

  public function visibilidad(Request $request, $id)
  {
    $tema = Tema::findOrFail($id);

    // Obtener el valor del checkbox (puede ser "on" o null)
    $visibilidad = $request->input('visibilidad');

    // Convertir el valor a un booleano
    $tema->visibilidad = $visibilidad === "on";

    $tema->save();

    return redirect()->back();
  }

  public function index($id)
  {
    $temas = Tema::findOrFail($id);

    $contenido = TemaTeoriaPractica::with('teoria', 'imagen', 'practica')
      ->where('id_tema_fk', $id)
      ->get();

    return view('logged/temas', compact('contenido', 'temas'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function create(Request $request)
  {
    $request->validate(
      [
        'titulo_tema' => 'required|max:250',
        'id_seccion' => 'required'
      ],
      [
        'required' => 'El campo es obligatorio.',
        'titulo_tema.max' => 'El título no debe superar los 250 caracteres.',
      ]
    );

    $data = [
      'titulo_tema' => $request->input('titulo_tema'),
      'id_seccion_fk' => $request->input('id_seccion')
    ];

    Tema::create($data);

    return redirect()->route('dashboardAction', ['action' => 'temas'])->with('success', 'Tema agregada exitosamente');
  }

  /**
   * Show the form for editing the specified resource.
   */

  public function edit($id)
  {
    $secciones = Seccione::all();
    $temas = Tema::all();
    $temaId = Tema::findOrFail($id);

    // dd($temaId->secciones);

    return view('dashboard/temas/edit', compact('temaId', 'temas', 'secciones'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $data, $id)
  {
    $rules = [
      'titulo_tema' => 'required|max:250',
    ];

    // Mensajes de error personalizados
    $messages = [
      'name.required' => 'El Titulo es obligatorio.',
      'name.max' => 'El nombre no debe superar los 250 caracteres.',
    ];

    // Valida los datos de entrada con las reglas definidas
    $this->validate($data, $rules, $messages);

    // Buscar la seccion por su ID
    $tema = Tema::findOrFail($id);

    // Actualizar los campos de la campo utilizando los valores del formulario
    $tema->update([
      'titulo_tema' => $data->input('titulo_tema'),
      'id_seccion_fk' => $data->input('id_seccion') ?: null,
    ]);

    return redirect()->route('dashboardAction', ['action' => 'temas'])->with('success', 'Tema actualizada exitosamente');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function delete($id)
  {
    // Buscar la campo por su ID
    $tema = Tema::findOrFail($id);

    // Eliminar la campo
    $tema->delete();

    return redirect()->route('dashboardAction', ['action' => 'temas'])->with('success', 'Tema eliminada exitosamente');
  }
}
