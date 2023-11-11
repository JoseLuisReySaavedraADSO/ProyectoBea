<?php

namespace App\Http\Controllers;

use App\Models\Imagene;
use App\Models\Practica;
use App\Models\Tema;
use App\Models\TemaTeoriaPractica;
use App\Models\Teoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Intervention\Image\ImageManagerStatic as Image;

class TeoriasController extends Controller
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

    public function edit($id)
    {
        $teoriaId = TemaTeoriaPractica::findOrFail($id);
        $teorias = TemaTeoriaPractica::all();
        $temas = Tema::all();

        return view('dashboard/teorias/edit', compact('temas', 'teorias', 'teoriaId'));
    }

    public function create(Request $request)
    {
        try {
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
                'titulo_teoria.required' => 'El campo de titulo es necesario',
                'descripcion_teoria.required' => 'El campo de titulo es necesario',
                'titulo_teoria.max' => 'El titulo de la teoria supera los 250 caracteres',
                'descripcion_teoria.max' => 'El titulo de la teoria supera los 250 caracteres',
                'imagen_teoria.dimensions' => 'Las dimensiones de la imagen no son válidas. El ancho máximo permitido es :max_width y la altura máxima permitida es :max_height.',
                'imagen_teoria.image' => 'El archivo seleccionado no es una imagen válida.',
                'imagen_teoria.required' => 'La imagen es necesaria',
                'pdf_practica.mimes' => 'El archivo seleccionado no es un PDF válido.',
                'pdf_practica.max' => 'El archivo pdf supera el tamaño maximo de :max KB',
                'pdf_practica.required' => 'El archivo pdf es necesario',


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
            // dd($request->input('id_tema'));
            $data = [
                'id_tema_fk' => $request->input('id_tema'),
                'id_teoria_fk' => $teoria->id,
                'id_practica_fk' => $pdfModel->id,
                'id_img_fk' => $imagenModel->id,
            ];

            // dd(TemaTeoriaPractica::create($data));

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


    public function update(Request $request, $id)
    {
        // try {
            // Validar la solicitud
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

            // Obtener la teoría existente
            $teoriaId = Teoria::findOrFail($id);

            // Actualizar la teoría con los nuevos datos
            $teoriaId->update([
                'titulo_teoria' => $request->input('titulo_teoria'),
                'desc_teoria' => $request->input('descripcion_teoria'),
            ]);

            $teoria = TemaTeoriaPractica::findOrFail($id);

            // Actualizar la imagen si se proporciona una nueva
            if ($request->hasFile('imagen_teoria')) {
                // Eliminar la imagen anterior
                Storage::delete('public/' . $teoria->imagen->path);

                // Guardar la nueva imagen
                $imagen = $request->file('imagen_teoria');
                $imagenPath = $imagen->store('public/imagenes');
                $imagenPathEnBaseDeDatos = str_replace('public/', '', $imagenPath);

                // Actualizar el modelo de imagen en la base de datos
                $teoria->imagen->update(['path' => $imagenPathEnBaseDeDatos]);
            }

            // Actualizar el PDF si se proporciona uno nuevo
            if ($request->hasFile('pdf_practica')) {
                // Eliminar el PDF anterior
                Storage::delete('public/' . $teoria->practica->pdf_path);

                // Guardar el nuevo PDF
                $pdf = $request->file('pdf_practica');
                $pdfPath = $pdf->store('public/pdfs');
                $pdfPathEnBaseDeDatos = str_replace('public/', '', $pdfPath);

                // Actualizar el modelo de práctica en la base de datos
                $teoria->practica->update(['pdf_path' => $pdfPathEnBaseDeDatos]);
            }

            // Actualizar la tabla relacional

            $teoria->update([
                'id_tema_fk' => $request->input('id_tema'),
            ]);

            // Redirigir a una página de confirmación o realizar otra acción
            return redirect()->route('dashboardAction', ['action' => 'teorias'])->with('success', 'Teoría actualizada exitosamente.');
        // } catch (\Exception $e) {
        //     // Manejar errores aquí
        //     return redirect()->route('dashboardAction', ['action' => 'teorias'])->with('error', 'Error al actualizar la teoría.');
        // }
    }

    public function delete($id)
    {
        // try {
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

        // } catch (\Exception $e) {
        //     // Manejar errores aquí
        //     return redirect()->route('dashboardAction', ['action' => 'teorias'])->with('error', 'Error al eliminar la teoría.');
        // }
    }
}
