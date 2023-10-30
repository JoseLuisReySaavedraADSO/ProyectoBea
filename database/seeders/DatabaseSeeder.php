<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Permiso::factory()->create([
        //     'nom_perm' => 'editar',
        //     'desc_perm' => 'El usuario puede editar',
        // ]);

        // \App\Models\Role::factory()->create([
        //     'nom_rol' => 'Administrador',
        //     'id_permiso_fk' => '1',
        // ]);

        $fechaNacimiento = '2004-04-24'; // Formatea la fecha en el formato correcto

        \App\Models\User::factory()->create([
            'nombre' => 'Jose Rey',
            'telefono' => '3013685277',
            'num_doc' => '1096538133',
            'tipo_doc' => 'CC',
            'correo_inst' => 'joslrey@misena.edu.co',
            'correo_alt' => 'reysaavedra123@gmail.com',
            'regional' => 'Santander',
            'fecha_nac' => $fechaNacimiento,
            'centro_form' => 'Centro Industrial de Mantenimiento Integral',
            'password' => '$2y$10$Q5x3zLabszTlwIXIolIBkuALFxT8bpPdrSWMQSWj5ivmFLIhKPUV2',
            'remember_token'=> '43637',
        ]);
    }
}
