<?php

namespace App\Http\Controllers;

use App\Models\Imagene;
use App\Models\Practica;
use App\Models\TemaTeoriaPractica;
use App\Models\Teoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeoriasController extends Controller
{
    public function __invoke($action, $id = null)
    {
        switch ($action) {
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

    public function create(Request $request)
    {
        // $request->validate([
        //     'titulo_teoria' => 'required|string|max:255',
        //     'descripcion_teoria' => 'required|string',
        //     'imagen_teoria' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'pdf_practica' => 'required|mimes:pdf|max:2048',
        //     'id_tema' => 'required|exists:temas,id',
        // ]);

        // dd('llegue aqui');

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

        $pdfModel = Practica::create(['pdf_path' => $pdfPath]);

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

        // } catch (\Exception $e) {
        //     // Revertir cambios en caso de error
        //     if (isset($teoria)) {
        //         $teoria->delete();
        //     }
        //     if (isset($imagenModel)) {
        //         $imagenModel->delete();
        //         Storage::delete($imagenPath);
        //     }
        //     if (isset($pdfModel)) {
        //         $pdfModel->delete();
        //         // dd(Storage::delete($pdfPath));
        //         Storage::delete($pdfPath);
        //     }

        //     // Manejar el error según tus necesidades
        //     return redirect()->route('dashboardAction', ['action' => 'teorias'])->with('success', 'Error al crear la teoría.');
        // }
    }
}
