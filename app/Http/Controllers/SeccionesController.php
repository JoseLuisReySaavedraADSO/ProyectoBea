<?php

namespace App\Http\Controllers;

use App\Models\Seccione;
use App\Models\Tema;
use App\Models\TemaTeoriaPractica;
use App\Models\User;
use Illuminate\Http\Request;

class SeccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secciones = Tema::with('secciones')->get(); 
        return view('logged/sections', compact('secciones'));
    }


    public function tema($id)
    {
        $temas = Seccione::findOrFail($id);
        $contenido = TemaTeoriaPractica::all();
        // $contenido = $temas::with('TemaTeoriaPractica')->get(); 
        dd($contenido);
        return view('logged/temas', compact('temas'));
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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
