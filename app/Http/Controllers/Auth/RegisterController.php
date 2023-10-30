<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['nullable', 'string', 'max:250'],
            'telefono' => ['nullable', 'string', 'max:10'],
            'num_doc' => ['required', 'string', 'max:10', 'unique:users'],
            'tipo_doc' => ['required', 'string', 'max:250'],
            'correo_inst' => ['required', 'string', 'email', 'max:250', 'unique:users'],
            'correo_alt' => ['nullable', 'string', 'email', 'max:250'],
            'regional' => ['required', 'string', 'max:250'],
            'fecha_nac' => ['required', 'date'],
            'centro_form' => ['required', 'string', 'max:250'],
            // 'password' => ['required', 'string', 'min:3', 'confirmed'],
        ]);
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
        
        return User::create([
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
    }
}
