<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected $tiposDocumento = ['Cédula de Ciudadanía','Tarjeta de Identidad','Cédula de Extranjería','Número ciego SENA','Pasaporte','Documento Nacional de Identificación Pasaporte','Número de Identificación Tributaria','PEP - RAMV','PEP','Permiso por Protección Temporal',
    ];

    protected $departamentos = [
        'Amazonas','Antioquia','Arauca','Atlántico','Bolívar','Boyacá','Caldas','Caquetá','Casanare','Cauca','Cesar','Chocó','Córdoba','Cundinamarca','Guainía','Guaviare','Huila','La Guajira','Magdalena','Meta','Nariño','Norte de Santander','Putumayo','Quindío','Risaralda','San Andrés y Providencia','Santander','Sucre','Tolima','Valle del Cauca','Vaupés','Vichada',
    ];
    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'required' => 'Este campo es obligatorio.',
            'numeric' => 'Este campo debe ser numérico.',
            'digits' => 'Debe tener exactamente 10 dígitos.',
            'digits_between' => 'Debe tener entre 6 y 10 dígitos.',
            'unique' => 'Ya tienes asociado este campo con otro usuario.',
            'regex' => 'Este campo solo deberia tener letras',
            'fecha_nac.date' => 'El campo de fecha de nacimiento debe ser una fecha válida.',
            'fecha_nac.before' => 'La fecha de nacimiento no puede ser mayor que la fecha actual.',
            'fecha_nac.after' => 'La fecha de nacimiento no puede ser menor a 100 años antes de la fecha actual.',
        ];

        $fechaActual = Carbon::now();
        $fechaHace100Anios = Carbon::now()->subYears(100);

        return Validator::make($data, [
            'nombre' => ['nullable', 'string', 'max:250', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'],
            'telefono' => ['required', 'numeric', 'digits:10'],
            'num_doc' => ['required', 'numeric', 'digits_between:6,10', 'unique:users'],
            'tipo_doc' => ['required', 'string', 'max:250'],
            'email' => ['required', 'string', 'email', 'max:250', 'unique:users'],
            'correo_alt' => ['required', 'string', 'email', 'max:250'],
            'regional' => ['required', 'string', 'max:250'],
            'centro_form' => ['required', 'string', 'max:250', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/'],
            'fecha_nac' => [
                'required',
                'date',
                'before:' . $fechaActual,
                'after:' . $fechaHace100Anios,
            ],
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $data['id_rol_fk'] = 2;
        $data['password'] = $data['num_doc'];
        $token = Str::random(10);

        return User::create([
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
            'remember_token' => $token,
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // Puedes pasar el array $tiposDocumento a la vista
        return view('auth.register', ['tiposDocumento' => $this->tiposDocumento, 'departamentos' => $this->departamentos]);
    }
}
