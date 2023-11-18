<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagene;
use App\Models\Practica;
use App\Models\Tema;
use App\Models\TemaTeoriaPractica;
use App\Models\Teoria;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Intervention\Image\ImageManagerStatic as Image;

class TeoriasController extends Controller
{
  /**
   * Invoca la acción correspondiente según la solicitud.
   *
   * @param string $action La acción a realizar.
   * @param int|null $id El ID de la teoría (opcional).
   *
   * @return mixed Retorna el resultado de la acción.
   */
  public function __invoke($action, $id = null)
  {
    switch ($action) {
      case 'index':
        return $this->index($id);
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
   * Muestra la vista de teorías.
   *
   * @param int $id El ID de la teoría.
   *
   * @return \Illuminate\Contracts\Support\Renderable Retorna la vista de teorías.
   */
  public function index($id)
  {
    // Encontrar la teoría por su ID
    $teoria = TemaTeoriaPractica::findOrFail($id);

    // Retornar la vista de teorías con la teoría específica
    return view('logged/teorias', compact('teoria'));
  }

  /**
   * Cambia la visibilidad de una teoría.
   *
   * @param \Illuminate\Http\Request $request La solicitud HTTP.
   * @param int $id El ID de la teoría.
   *
   * @return \Illuminate\Http\RedirectResponse Redirecciona de nuevo a la página anterior.
   */
  public function visibilidad(Request $request, $id)
  {
    // Encontrar la teoría por su ID
    $teoria = TemaTeoriaPractica::findOrFail($id);

    // Obtener el valor del checkbox (puede ser "on" o null)
    $visibilidad = $request->input('visibilidad');

    // Convertir el valor a un booleano y actualizar la visibilidad de la teoría
    $teoria->visibilidad = $visibilidad === "on";
    $teoria->save();

    // Redirigir de nuevo a la página anterior
    return redirect()->back();
  }

  /**
   * Muestra el formulario para editar una teoría.
   *
   * @param int $id El ID de la teoría a editar.
   *
   * @return \Illuminate\Contracts\Support\Renderable Retorna la vista del formulario de edición.
   */
  public function edit($id)
  {
    // Encontrar la teoría por su ID
    $teoriaId = TemaTeoriaPractica::findOrFail($id);
    $teorias = TemaTeoriaPractica::all();
    $temas = Tema::all();

    // Retornar la vista del formulario de edición con datos necesarios
    return view('dashboard/teorias/edit', compact('temas', 'teorias', 'teoriaId'));
  }

  /**
   * Almacena una nueva teoría en la base de datos.
   *
   * @param \Illuminate\Http\Request $request La solicitud HTTP con los datos del formulario.
   *
   * @return \Illuminate\Http\RedirectResponse Redirecciona a la página de teorías con un mensaje de éxito.
   */
  public function create(Request $request)
  {
    try {
      // Validar la solicitud
      $request->validate([
        'titulo_teoria' => 'required|string|max:255',
        'descripcion_teoria' => 'required|string|max:1000',
        'imagen_teoria' => [
          'required',
          'file',
          Rule::dimensions()->maxWidth(5000)->maxHeight(5000),
          'image',
          'max:2048',
        ],
        'pdf_practica' => [
          'required',
          'file',
          'mimes:pdf',
          'max:2048',
        ],
        'id_tema' => 'required|exists:temas,id',
      ], [
        'titulo_teoria.required' => 'El campo de título es necesario',
        'descripcion_teoria.required' => 'El campo descripción es necesario',
        'titulo_teoria.max' => 'El título de la teoría supera los 255 caracteres',
        'descripcion_teoria.max' => 'La descripción de la teoría supera los 1000 caracteres',
        'imagen_teoria.dimensions' => 'Las dimensiones de la imagen no son válidas. El ancho máximo permitido es :max_width y la altura máxima permitida es :max_height.',
        'imagen_teoria.image' => 'El archivo seleccionado no es una imagen válida.',
        'imagen_teoria.required' => 'La imagen es necesaria',
        'pdf_practica.mimes' => 'El archivo seleccionado no es un PDF válido.',
        'pdf_practica.max' => 'El archivo PDF supera el tamaño máximo de :max KB',
        'pdf_practica.required' => 'El archivo PDF es necesario',
      ]);

      // Guardar la teoría
      $teoria = Teoria::create([
        'titulo_teoria' => $request->input('titulo_teoria'),
        'desc_teoria' => $request->input('descripcion_teoria'),
      ]);

      // Guardar la imagen
      $imagen = $request->file('imagen_teoria');
      $imagenPath = $imagen->store('public/imagenes');

      // Eliminar el prefijo "public/" de la ruta antes de almacenarla en la base de datos
      $imagenPathEnBaseDeDatos = str_replace('public/', '', $imagenPath);

      $imagenModel = Imagene::create(['path' => $imagenPathEnBaseDeDatos]);

      // Guardar el PDF
      $pdf = $request->file('pdf_practica');
      $pdfPath = $pdf->store('public/pdfs');

      $pdfPathEnBaseDeDatos = str_replace('public', '', $pdfPath);

      $pdfModel = Practica::create(['pdf_path' => $pdfPathEnBaseDeDatos]);

      // Actualizar la tabla relacional
      $data = [
        'id_tema_fk' => $request->input('id_tema'),
        'id_teoria_fk' => $teoria->id,
        'id_practica_fk' => $pdfModel->id,
        'id_img_fk' => $imagenModel->id,
      ];

      TemaTeoriaPractica::create($data);

      // Redirigir a una página de confirmación o realizar otra acción
      return redirect()->route('dashboardAction', ['action' => 'teorias'])->with('success', 'Teoría creada exitosamente.');
    } catch (ValidationException $e) {
      // Obtener mensajes de error de la validación
      $validatorMessages = $e->validator->errors()->all();

      // Revertir cambios en caso de error
      if (isset($teoria)) {
        $teoria->delete();
      }
      if (isset($imagenModel)) {
        $imagenModel->delete();
        Storage::delete($imagenPath);
      }
      if (isset($pdfModel)) {
        $pdfModel->delete();
        Storage::delete($pdfPath);
      }

      // Redirigir con mensajes de error
      return redirect()->route('dashboardAction', ['action' => 'teorias'])
        ->withErrors($validatorMessages)
        ->withInput();
    } catch (\Exception $e) {
      // Manejar otros tipos de excepciones aquí
      return redirect()->route('dashboardAction', ['action' => 'teorias'])
        ->with('error', 'Error al procesar la solicitud.')
        ->withInput();
    }
  }



  /**
   * Maneja la actualización de una teoría y práctica existente.
   *
   * @param \Illuminate\Http\Request $request La solicitud HTTP.
   * @param int $id El ID de la teoría y práctica a actualizar.
   * @return \Illuminate\Http\RedirectResponse La respuesta de redirección.
   */
  public function update(Request $request, $id)
  {
    try {
      $request->validate([
        'titulo_teoria' => 'required|string|max:255',
        'descripcion_teoria' => 'required|string|max:1000',
        'imagen_teoria' => [
          'nullable',
          'file',
          Rule::dimensions()->maxWidth(5000)->maxHeight(5000),
          'image',
          'max:2048',
        ],
        'pdf_practica' => [
          'nullable',
          'file',
          'mimes:pdf',
          'max:2048',
        ],
        'id_tema' => 'required|exists:temas,id',
      ], [
        'titulo_teoria.max' => 'El título de la teoría no debe superar los 255 caracteres.',
        'descripcion_teoria.max' => 'La descripción de la teoría no debe superar los 1000 caracteres.',
        'imagen_teoria.dimensions' => 'Las dimensiones de la imagen no son válidas. El ancho máximo permitido es :max_width y la altura máxima permitida es :max_height.',
        'imagen_teoria.image' => 'El archivo seleccionado no es una imagen válida.',
        'pdf_practica.mimes' => 'El archivo seleccionado no es un PDF válido.',
        'pdf_practica.max' => 'El archivo PDF supera el tamaño máximo de :max KB.',
      ]);

      $teoriaId = Teoria::findOrFail($id);

      $teoriaId->update([
        'titulo_teoria' => $request->input('titulo_teoria'),
        'desc_teoria' => $request->input('descripcion_teoria'),
      ]);

      $teoria = TemaTeoriaPractica::findOrFail($id);

      if ($request->hasFile('imagen_teoria')) {
        Storage::delete('public/' . $teoria->imagen->path);
        $imagen = $request->file('imagen_teoria');
        $imagenPath = $imagen->store('public/imagenes');
        $imagenPathEnBaseDeDatos = str_replace('public/', '', $imagenPath);
        $teoria->imagen->update(['path' => $imagenPathEnBaseDeDatos]);
      }

      if ($request->hasFile('pdf_practica')) {
        Storage::delete('public/' . $teoria->practica->pdf_path);
        $pdf = $request->file('pdf_practica');
        $pdfPath = $pdf->store('public/pdfs');
        $pdfPathEnBaseDeDatos = str_replace('public/', '', $pdfPath);
        $teoria->practica->update(['pdf_path' => $pdfPathEnBaseDeDatos]);
      }

      $teoria->update([
        'id_tema_fk' => $request->input('id_tema'),
      ]);

      return redirect()->route('dashboardAction', ['action' => 'teorias'])->with('success', 'Teoría actualizada exitosamente.');
    } catch (\Exception $e) {
      return redirect()->route('dashboardAction', ['action' => 'teorias'])->with('error', 'Error al actualizar la teoría.');
    }
  }

  /**
   * Maneja la eliminación de una teoría y práctica.
   *
   * @param int $id El ID de la teoría y práctica a eliminar.
   * @return \Illuminate\Http\RedirectResponse La respuesta de redirección.
   */

  public function delete($id)
  {
    try {
      // Obtener la teoría a eliminar
      $registro = TemaTeoriaPractica::findOrFail($id);

      // Obtener modelos relacionados
      $imagenModel = Imagene::find($registro->id_img_fk);
      $pdfModel = Practica::find($registro->id_practica_fk);
      $teoria = Teoria::find($registro->id_teoria_fk);
      // Eliminar el registro en TemaTeoriaPractica
      $registro->delete();
      $teoria->delete();

      // Eliminar el modelo de imagen y su archivo asociado
      if ($imagenModel) {
        Storage::delete('public/' . $imagenModel->path);
        $imagenModel->delete();
      }

      // Eliminar el modelo de PDF y su archivo asociado
      if ($pdfModel) {
        Storage::delete('public/' . $pdfModel->pdf_path);
        $pdfModel->delete();
      }


      // Redirigir con mensaje de éxito
      return redirect()->route('dashboardAction', ['action' => 'teorias'])->with('success', 'Teoría eliminada exitosamente.');
    } catch (\Exception $e) {
      // Manejar errores aquí
      return redirect()->route('dashboardAction', ['action' => 'teorias'])->with('error', 'Error al eliminar la teoría.');
    }
  }
}
