<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Seccione;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Crea una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Maneja las llamadas de método dinámicas al controlador.
     *
     * @param  string  $action
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    public function __invoke($action, $id = null)
    {
        // Realiza acciones dinámicas basadas en la acción proporcionada
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

    /**
     * Obtiene un validador para una solicitud de registro entrante.
     *
     * @param  array  $data
     * @param  User|null  $user
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $user = null)
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
            'email.required' => 'Este campo es obligatorio.',
            'email.unique' => 'Ya tienes asociado este correo con otro usuario.',
            'correo_alt.required' => 'Este campo es obligatorio.',
            'regional.required' => 'Este campo es obligatorio.',
            'fecha_nac.required' => 'Este campo es obligatorio.',
            'centro_form.required' => 'Este campo es obligatorio.',
        ];

        return Validator::make($data, [
            'nombre' => ['string', 'max:250'],
            'telefono' => ['required', 'numeric', 'digits:10'],
            'num_doc' => ['required','numeric', 'digits_between:6,10',Rule::unique('users')->ignore($user ? $user->id : null)],
            'tipo_doc' => ['required', 'string', 'max:250'],
            'email' => ['required','string','email','max:250',Rule::unique('users')->ignore($user ? $user->id : null)],
            'correo_alt' => ['required', 'string', 'email', 'max:250'],
            'regional' => ['required', 'string', 'max:250'],
            'fecha_nac' => ['required', 'date'],
            'centro_form' => ['required', 'string', 'max:250'],
        ], $messages);
    }
    
    /**
     * Crea una nueva instancia de usuario después de una registración válida.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Response
     */
    protected function create(array $data)
    {
        // Valida la entrada del usuario
        $this->validator($data)->validate();

        // Establece la contraseña como el número de documento
        $data['password'] = $data['num_doc'];

        // Crea un nuevo usuario
        $user = User::create([
            'id_rol_fk' => $data['id_rol_fk'],
            'nombre' => $data['nombre'],
            'telefono' => $data['telefono'],
            'num_doc' => $data['num_doc'],
            'tipo_doc' => $data['tipo_doc'],
            'email' => $data['email'],
            'correo_alt' => $data['correo_alt'],
            'regional' => $data['regional'],
            'fecha_nac' => $data['fecha_nac'],
            'centro_form' => $data['centro_form'],
            'password' => Hash::make($data['password']),
        ]);

        // Sincroniza las secciones del usuario
        $user->secciones()->sync($data['vistas']);
        
        return redirect()->route('view', ['view' => 'dashboard.users.view'])->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar el recurso especificado.
     *
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    protected function edit($id)
    {
        // Encuentra al usuario por ID
        $userId = User::findOrFail($id);

        // Obtiene las secciones asociadas con el usuario
        $usuarioSecciones = $userId->secciones()->pluck('id')->toArray();

        // Datos adicionales para la vista
        $data = User::paginate(100);
        $fechaNac = Carbon::parse($userId->fecha_nac)->format('Y-m-d');
        $rol = Role::all();
        $seccion = Seccione::all();

        // Arreglos para las listas desplegables
        $tiposDocumento = ['Cédula de Ciudadanía','Tarjeta de Identidad','Cédula de Extranjería','Número ciego SENA','Pasaporte','Documento Nacional de Identificación Pasaporte','Número de Identificación Tributaria','PEP - RAMV','PEP','Permiso por Protección Temporal',];
        $departamentos = ['Amazonas','Antioquia','Arauca','Atlántico','Bolívar','Boyacá','Caldas','Caquetá','Casanare','Cauca','Cesar','Chocó','Córdoba','Cundinamarca','Guainía','Guaviare','Huila','La Guajira','Magdalena','Meta','Nariño','Norte de Santander','Putumayo','Quindío','Risaralda','San Andrés y Providencia','Santander','Sucre','Tolima','Valle del Cauca','Vaupés','Vichada',];

        // Retorna la vista de edición con los datos necesarios
        return view('dashboard\users\edit', compact('userId', 'rol', 'fechaNac', 'data', 'tiposDocumento', 'departamentos', 'seccion', 'usuarioSecciones'));
    }
    
    /**
     * Actualiza el recurso especificado en el almacenamiento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    protected function update(Request $request, $id)
    {
        // Encuentra al usuario por ID
        $user = User::findOrFail($id);

        // Valida la entrada del usuario
        $this->validator($request->all(), $user)->validate();

        // Actualiza los datos del usuario
        $user->id_rol_fk = $request->input('id_rol_fk');
        $user->nombre = $request->input('nombre');
        $user->telefono = $request->input('telefono');
        $user->num_doc = $request->input('num_doc');
        $user->tipo_doc = $request->input('tipo_doc');
        $user->email = $request->input('email');
        $user->correo_alt = $request->input('correo_alt');
        $user->regional = $request->input('regional');
        $user->fecha_nac = $request->input('fecha_nac');
        $user->centro_form = $request->input('centro_form');
        
        $user->save();

        // Sincroniza las secciones del usuario
        $user->secciones()->sync($request->input('vistas'));

        return redirect()->route('view', ['view' => 'dashboard.users.view'])->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Elimina el recurso especificado del almacenamiento.
     *
     * @param  mixed  $id
     * @return \Illuminate\Http\Response
     */
    protected function delete($id)
    {
        // Encuentra al usuario por ID
        $user = User::find($id);

        // Elimina al usuario
        $user->delete();

        return redirect()->route('view', ['view' => 'dashboard.users.view'])->with('success', 'Usuario eliminado exitosamente.');
    }

    /**
     * Actualiza la información de perfil del usuario autenticado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function profile(Request $request)
    {
        // Obtiene al usuario autenticado
        $user = Auth::user();

        // Valida la entrada del usuario
        $this->validator($request->all(), $user)->validate();

        // Actualiza los datos del perfil del usuario
        $user->nombre = $request->input('nombre');
        $user->telefono = $request->input('telefono');
        $user->num_doc = $request->input('num_doc');
        $user->tipo_doc = $request->input('tipo_doc');
        $user->email = $request->input('email');
        $user->correo_alt = $request->input('correo_alt');
        $user->regional = $request->input('regional');
        $user->fecha_nac = $request->input('fecha_nac');
        $user->centro_form = $request->input('centro_form');
        
        $user->save();

        return redirect()->route('view', ['view' => 'profile.user'])->with('success', 'Usuario actualizado exitosamente.');
    }
}
