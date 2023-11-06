<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function secciones()
    {
        $secciones = Tema::all(); 
        // dd($secciones[2]->titulo_tema);
        return view('dashboard/secciones/secciones', compact('secciones'));
    }

    public function temas()
    {
        return view('dashboard/temas/temas');
    }

    public function teorias()
    {
        return view('dashboard/teorias/teorias');
    }
}
