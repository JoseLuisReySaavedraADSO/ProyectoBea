<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seccione;
use App\Models\Tema;
use App\Models\TemaTeoriaPractica;

class TemasController extends Controller
{
    /**
     * Invoca la acción correspondiente según la solicitud.
     *
     * @param string $action La acción a realizar.
     * @param int|null $id El ID del tema (opcional).
     *
     * @return mixed Retorna el resultado de la acción.
     */
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
     * Cambia la visibilidad de un tema.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP.
     * @param int $id El ID del tema.
     *
     * @return \Illuminate\Http\RedirectResponse Redirecciona de nuevo a la página anterior.
     */
    public function visibilidad(Request $request, $id)
    {
        // Encontrar el tema por su ID
        $tema = Tema::findOrFail($id);

        // Obtener el valor del checkbox (puede ser "on" o null)
        $visibilidad = $request->input('visibilidad');

        // Convertir el valor a un booleano y actualizar la visibilidad del tema
        $tema->visibilidad = $visibilidad === "on";
        $tema->save();

        // Redirigir de nuevo a la página anterior
        return redirect()->back();
    }

    /**
     * Muestra los temas y su contenido asociado.
     *
     * @param int $id El ID del tema.
     *
     * @return \Illuminate\Contracts\Support\Renderable Retorna la vista con los temas y contenido asociado.
     */
    public function index($id)
    {
        // Obtener el tema y el contenido asociado con visibilidad activa
        $temas = Tema::findOrFail($id);
        $contenido = TemaTeoriaPractica::with('teoria', 'imagen', 'practica')
            ->where('id_tema_fk', $id)
            ->where('visibilidad', true)
            ->get();

        // Retornar la vista con los temas y contenido
        return view('logged/temas', compact('contenido', 'temas'));
    }

    /**
     * Muestra el formulario para crear un nuevo tema.
     *
     * @return \Illuminate\Contracts\Support\Renderable Retorna la vista del formulario de creación.
     */
    public function create(Request $request)
    {
        // Validar la solicitud
        $request->validate(
            [
                'titulo_tema' => 'required|max:250',
                'id_seccion' => 'required',
            ],
            [
                'required' => 'El campo es obligatorio.',
                'titulo_tema.max' => 'El título no debe superar los 250 caracteres.',
            ]
        );

        // Crear un nuevo registro de tema
        $data = [
            'titulo_tema' => $request->input('titulo_tema'),
            'id_seccion_fk' => $request->input('id_seccion'),
        ];
        Tema::create($data);

        // Redirigir a la página de temas con un mensaje de éxito
        return redirect()->route('dashboardAction', ['action' => 'temas'])->with('success', 'Tema agregado exitosamente');
    }

    /**
     * Muestra el formulario para editar un tema.
     *
     * @param int $id El ID del tema a editar.
     *
     * @return \Illuminate\Contracts\Support\Renderable Retorna la vista del formulario de edición.
     */
    public function edit($id)
    {
        // Obtener todas las secciones y temas, y el tema específico por su ID
        $secciones = Seccione::all();
        $temas = Tema::all();
        $temaId = Tema::findOrFail($id);

        // Retornar la vista del formulario de edición
        return view('dashboard/temas/edit', compact('temaId', 'temas', 'secciones'));
    }

    /**
     * Actualiza los datos de un tema en la base de datos.
     *
     * @param \Illuminate\Http\Request $data La solicitud HTTP con los datos del formulario.
     * @param int $id El ID del tema a actualizar.
     *
     * @return \Illuminate\Http\RedirectResponse Redirecciona a la página de temas con un mensaje de éxito.
     */
    public function update(Request $data, $id)
    {
        // Definir reglas de validación
        $rules = [
            'titulo_tema' => 'required|max:250',
        ];

        // Mensajes de error personalizados
        $messages = [
            'name.required' => 'El Titulo es obligatorio.',
            'name.max' => 'El nombre no debe superar los 250 caracteres.',
        ];

        // Validar los datos con las reglas y mensajes definidos
        $this->validate($data, $rules, $messages);

        // Encontrar el tema por su ID
        $tema = Tema::findOrFail($id);

        // Actualizar los campos del tema utilizando los valores del formulario
        $tema->update([
            'titulo_tema' => $data->input('titulo_tema'),
            'id_seccion_fk' => $data->input('id_seccion') ?: null,
        ]);

        // Redirigir a la página de temas con un mensaje de éxito
        return redirect()->route('dashboardAction', ['action' => 'temas'])->with('success', 'Tema actualizado exitosamente');
    }

    /**
     * Elimina un tema de la base de datos.
     *
     * @param int $id El ID del tema a eliminar.
     *
     * @return \Illuminate\Http\RedirectResponse Redirecciona a la página de temas con un mensaje de éxito.
     */
    public function delete($id)
    {
        // Encontrar el tema por su ID
        $tema = Tema::findOrFail($id);

        // Eliminar el tema
        $tema->delete();

        // Redirigir a la página de temas con un mensaje de éxito
        return redirect()->route('dashboardAction', ['action' => 'temas'])->with('success', 'Tema eliminado exitosamente');
    }
}
