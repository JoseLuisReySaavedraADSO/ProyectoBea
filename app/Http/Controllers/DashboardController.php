<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function secciones()
    {
        return view('dashboard/secciones');
    }

    public function temas()
    {
        return view('dashboard/temas');
    }

    public function teorias()
    {
        return view('dashboard/teorias');
    }
}
