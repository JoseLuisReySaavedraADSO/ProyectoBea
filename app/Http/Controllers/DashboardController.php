<?php

namespace App\Http\Controllers;

use App\Models\Seccione;
use App\Models\Tema;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function secciones()
    {
        $secciones = Seccione::all();
        // dd($secciones[2]->titulo_tema);
        return view('dashboard/secciones/secciones', compact('secciones'));
    }

    public function temas()
    {
        $secciones = Seccione::all();
        $temas = Tema::all();

        return view('dashboard/temas/temas', compact('temas', 'secciones'));
    }

    public function teorias()
    {
        return view('dashboard/teorias/teorias');
    }
}
