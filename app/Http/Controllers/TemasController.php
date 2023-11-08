<?php

namespace App\Http\Controllers;

use App\Models\Seccione;
use App\Models\Tema;
use App\Models\TemaTeoriaPractica;
use App\Models\User;
use Illuminate\Http\Request;

class TemasController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index($id)
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
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
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

    return redirect()->route('dashboard.temas')->with('success', 'Tema agregada exitosamente');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
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

    // Actualizar los campos de la mascota utilizando los valores del formulario
    $tema->update([
      'titulo_tema' => $data->input('titulo_tema'),
      'id_seccion_fk' => $data->input('id_seccion') ?: null,
    ]);

    return redirect()->route('dashboard.temas')->with('success', 'Tema actualizada exitosamente');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    // Buscar la mascota por su ID
    $tema = Tema::findOrFail($id);

    // Eliminar la mascota
    $tema->delete();

    return redirect()->route('dashboard.temas')->with('success', 'Tema eliminada exitosamente');
  }
}
