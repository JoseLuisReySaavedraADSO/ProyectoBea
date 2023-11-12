<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($action, $id = null)
    {
        switch ($action) {
            case 'create':
                return $this->create(request()->all());
            case 'edit':
                return $this->edit($id);
            case 'update':
                return $this->update(request(), $id);
            case 'delete':
                return $this->delete($id);
            case 'profile':
                return $this->profile(request());
            default:
                return response()->json(['error' => 'Acción no válida'], 400);
            }
    }


    protected function validator(array $data)
    {
        $messages = [
            'regional.required' => 'Este campo es obligatorio.',
            'telefono.required' => 'Este campo es obligatorio.',
            'telefono.numeric' => 'Este campo debe ser numérico.',
            'telefono.digits' => 'El campo teléfono debe tener exactamente 10 dígitos.',
            'num_doc.required' => 'Este campo es obligatorio.',
            'num_doc.numeric' => 'Este campo debe ser numérico.',
            'num_doc.digits_between' => 'El campo número de documento debe tener entre 6 y 10 dígitos.',
            'num_doc.unique' => 'Ya tienes asociado este documento con otro usuario.',
            'tipo_doc.required' => 'Este campo es obligatorio.',
            'correo_inst.required' => 'Este campo es obligatorio.',
            'correo_inst.unique' => 'Ya tienes asociado este correo con otro usuario.',
            'correo_alt.required' => 'Este campo es obligatorio.',
            'regional.required' => 'Este campo es obligatorio.',
            'fecha_nac.required' => 'Este campo es obligatorio.',
            'centro_form.required' => 'Este campo es obligatorio.',
        ];

        return Validator::make($data, [
            'nombre' => ['nullable', 'string', 'max:250'],
            'telefono' => ['required', 'numeric', 'digits:10'],
            'num_doc' => ['required', 'numeric', 'digits_between:6,10', 'unique:users'],
            'tipo_doc' => ['required', 'string', 'max:250'],
            'correo_inst' => ['required', 'string', 'email', 'max:250', 'unique:users'],
            'correo_alt' => ['required', 'string', 'email', 'max:250'],
            'regional' => ['required', 'string', 'max:250'],
            'fecha_nac' => ['required', 'date'],
            'centro_form' => ['required', 'string', 'max:250'],
        ], $messages);
    }
    
    protected function create(array $data)
    {
        $this->validator($data)->validate();

        $data['id_rol_fk'] = 2;
        $data['password'] = $data['num_doc'];
        
        User::create([
            'id_rol_fk' => $data['id_rol_fk'],
            'nombre' => $data['nombre'],
            'telefono' => $data['telefono'],
            'num_doc' => $data['num_doc'],
            'tipo_doc' => $data['tipo_doc'],
            'correo_inst' => $data['correo_inst'],
            'correo_alt' => $data['correo_alt'],
            'regional' => $data['regional'],
            'fecha_nac' => $data['fecha_nac'],
            'centro_form' => $data['centro_form'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('view', ['view' => 'dashboard.users.view'])->with('success', 'Usuario creado exitosamente.');
    }

    protected function edit($id)
    {
        $userId = User::findOrFail($id);
        $data = User::paginate(100);
        $fechaNac = Carbon::parse($userId->fecha_nac)->format('Y-m-d');
        $rol = Role::all();
        // dd($fechaNac);

        $tiposDocumento = ['Cédula de Ciudadanía','Tarjeta de Identidad','Cédula de Extranjería','Número ciego SENA','Pasaporte','Documento Nacional de Identificación Pasaporte','Número de Identificación Tributaria','PEP - RAMV','PEP','Permiso por Protección Temporal',];
        $departamentos = ['Amazonas','Antioquia','Arauca','Atlántico','Bolívar','Boyacá','Caldas','Caquetá','Casanare','Cauca','Cesar','Chocó','Córdoba','Cundinamarca','Guainía','Guaviare','Huila','La Guajira','Magdalena','Meta','Nariño','Norte de Santander','Putumayo','Quindío','Risaralda','San Andrés y Providencia','Santander','Sucre','Tolima','Valle del Cauca','Vaupés','Vichada',];

        return view('dashboard\users\edit', compact('userId', 'rol', 'fechaNac', 'data', 'tiposDocumento', 'departamentos'));
    }
    
    protected function update(Request $request, $id)
    {
        // $this->validator($request->all())->validate();

        $user = User::findOrFail($id);

        $user->id_rol_fk = $request->input('id_rol_fk');
        $user->nombre = $request->input('nombre');
        $user->telefono = $request->input('telefono');
        $user->num_doc = $request->input('num_doc');
        $user->tipo_doc = $request->input('tipo_doc');
        $user->correo_inst = $request->input('correo_inst');
        $user->correo_alt = $request->input('correo_alt');
        $user->regional = $request->input('regional');
        $user->fecha_nac = $request->input('fecha_nac');
        $user->centro_form = $request->input('centro_form');
        
        $user->save();

        return redirect()->route('view', ['view' => 'dashboard.users.view'])->with('success', 'Usuario actualizado exitosamente.');
    }

    protected function delete($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('view', ['view' => 'dashboard.users.view'])->with('success', 'Usuario eliminado exitosamente.');
    }

    protected function profile(Request $request)
    {
        // $this->validator($request->all())->validate();

        $user = Auth::user();

        $user->nombre = $request->input('nombre');
        $user->telefono = $request->input('telefono');
        $user->num_doc = $request->input('num_doc');
        $user->tipo_doc = $request->input('tipo_doc');
        $user->correo_inst = $request->input('correo_inst');
        $user->correo_alt = $request->input('correo_alt');
        $user->regional = $request->input('regional');
        $user->fecha_nac = $request->input('fecha_nac');
        $user->centro_form = $request->input('centro_form');
        
        $user->save();

        return redirect()->route('view', ['view' => 'profile.user'])->with('success', 'Usuario actualizado exitosamente.');
    }
}
