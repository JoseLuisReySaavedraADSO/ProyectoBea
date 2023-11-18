<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seccione;
use App\Models\Tema;
use App\Models\TemaTeoriaPractica;
use App\Models\User;

class SeccionesController extends Controller
{
    /**
     * Invoca la acción correspondiente según la solicitud.
     *
     * @param string $action La acción a realizar.
     * @param int|null $id El ID de la sección (opcional).
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
     * Muestra una lista de las secciones visibles para el usuario.
     *
     * @return \Illuminate\Contracts\Support\Renderable Retorna la vista con las secciones visibles.
     */
    public function index()
    {
        // Obtener secciones visibles y secciones asociadas al usuario autenticado
        $seccionesVisibles = Seccione::where('visibilidad', true)->with('tema')->get();
        $usuario = User::findOrFail(auth()->user()->id);
        $seccionesUsuario = $usuario->secciones()->pluck('id')->toArray();

        // Filtrar las secciones visibles según las secciones asociadas al usuario
        $secciones = $seccionesVisibles->filter(function ($seccion) use ($seccionesUsuario) {
            return in_array($seccion->id, $seccionesUsuario);
        });

        // Retornar la vista con las secciones
        return view('logged/sections', compact('secciones'));
    }

    /**
     * Muestra los temas asociados a una sección.
     *
     * @param int $id El ID de la sección.
     *
     * @return \Illuminate\Contracts\Support\Renderable Retorna la vista con los temas y contenido asociado.
     */
    public function tema($id)
    {
        // Obtener el tema y el contenido asociado a la sección
        $temas = Tema::findOrFail($id);
        $contenido = TemaTeoriaPractica::with('teoria', 'imagen', 'practica')
            ->where('id_tema_fk', $id)
            ->get();

        // Retornar la vista con los temas y contenido
        return view('logged/temas', compact('contenido'));
    }

    /**
     * Cambia la visibilidad de una sección.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP.
     * @param int $id El ID de la sección.
     *
     * @return \Illuminate\Http\RedirectResponse Redirecciona de nuevo a la página anterior.
     */
    public function visibilidad(Request $request, $id)
    {
        // Encontrar la sección por su ID
        $seccion = Seccione::findOrFail($id);

        // Obtener el valor del checkbox (puede ser "on" o null)
        $visibilidad = $request->input('visibilidad');

        // Convertir el valor a un booleano y actualizar la visibilidad de la sección
        $seccion->visibilidad = $visibilidad === "on";
        $seccion->save();

        // Redirigir de nuevo a la página anterior
        return redirect()->back();
    }

    /**
     * Muestra el formulario para crear una nueva sección.
     *
     * @return \Illuminate\Contracts\Support\Renderable Retorna la vista del formulario de creación.
     */
    public function create(Request $request)
    {
        // Validar la solicitud
        $request->validate(
            [
                'titulo_seccion' => 'required|max:250',
            ],
            [
                'titulo_seccion.required' => 'El Título es obligatorio.',
                'titulo_seccion.max' => 'El título no debe superar los 250 caracteres.',
            ]
        );

        // Crear un nuevo registro de sección
        $data = [
            'titulo_seccion' => $request->input('titulo_seccion'),
        ];
        Seccione::create($data);

        // Redirigir a la página de secciones con un mensaje de éxito
        return redirect()->route('dashboardAction', ['action' => 'secciones'])->with('success', 'Sección agregada exitosamente');
    }

    /**
     * Muestra el formulario para editar una sección.
     *
     * @param int $id El ID de la sección a editar.
     *
     * @return \Illuminate\Contracts\Support\Renderable Retorna la vista del formulario de edición.
     */
    public function edit($id)
    {
        // Obtener todas las secciones y la sección específica por su ID
        $secciones = Seccione::all();
        $seccionId = Seccione::findOrFail($id);

        // Retornar la vista del formulario de edición
        return view('dashboard/secciones/edit', compact('seccionId', 'secciones'));
    }

    /**
     * Actualiza los datos de una sección en la base de datos.
     *
     * @param \Illuminate\Http\Request $data La solicitud HTTP con los datos del formulario.
     * @param int $id El ID de la sección a actualizar.
     *
     * @return \Illuminate\Http\RedirectResponse Redirecciona a la página de secciones con un mensaje de éxito.
     */
    public function update(Request $data, $id)
    {
        // Definir reglas de validación
        $rules = [
            'titulo_seccion' => 'required|max:250',
        ];

        // Mensajes de error personalizados
        $messages = [
            'name.required' => 'El Titulo es obligatorio.',
            'name.max' => 'El nombre no debe superar los 250 caracteres.',
        ];

        // Validar los datos con las reglas y mensajes definidos
        $this->validate($data, $rules, $messages);

        // Encontrar la sección por su ID
        $seccion = Seccione::findOrFail($id);

        // Actualizar los campos de la sección utilizando los valores del formulario
        $seccion->update([
            'titulo_seccion' => $data->input('titulo_seccion'),
        ]);

        // Redirigir a la página de secciones con un mensaje de éxito
        return redirect()->route('dashboardAction', ['action' => 'secciones'])->with('success', 'Seccion actualizada exitosamente');
    }

    /**
     * Elimina una sección de la base de datos.
     *
     * @param int $id El ID de la sección a eliminar.
     *
     * @return \Illuminate\Http\RedirectResponse Redirecciona a la página de secciones con un mensaje de éxito.
     */
    public function delete($id)
    {
        // Encontrar la sección por su ID
        $seccion = Seccione::findOrFail($id);

        // Eliminar la sección
        $seccion->delete();

        // Redirigir a la página de secciones con un mensaje de éxito
        return redirect()->route('dashboardAction', ['action' => 'secciones'])->with('success', 'Seccion eliminada exitosamente');
    }
}
