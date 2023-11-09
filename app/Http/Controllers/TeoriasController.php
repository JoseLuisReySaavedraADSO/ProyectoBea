<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeoriasController extends Controller
{
    public function __invoke($action, $id = null)
    {
        switch ($action) {
            case 'create':
                return $this->create();
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
    
    public function create() 
    {

    }
}
