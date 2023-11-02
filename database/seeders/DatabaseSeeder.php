<?php

namespace Database\Seeders;

use App\Models\Permiso;
use App\Models\Role;
use App\Models\Seccione;
use App\Models\Tema;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $fechaNacimiento = '2004-04-24'; // Formatea la fecha en el formato correcto

        Permiso::create([
            'nom_perm' => 'Editar',
            'desc_perm' => 'El usuario puede editar',
        ]);

        Permiso::create([
            'nom_perm' => 'Visualizar',
            'desc_perm' => 'El usuario puede visualizar',
        ]);

        Role::create([
            'nom_rol' => 'Administrador',
            'id_permiso_fk' => '1',
        ]);

        Role::create([
            'nom_rol' => 'Aprendiz',
            'id_permiso_fk' => '2',
        ]);

        // Insertar 20 registros de Tema y Seccione
        for ($i = 1; $i <= 20; $i++) {
            // Insertar un registro de Tema
            Tema::create([
                "id" => $i,
                "titulo_tema" => "Tema " . $i,
                "desc_tema" => "Descripción del Tema " . $i,
                "created_at" => "2023-11-02 01:59:25",
                "updated_at" => "2023-11-02 01:59:25",
            ]);

            // Insertar un registro de Seccion relacionado al Tema
            Seccione::create([
                "id" => $i,
                "id_tema_fk" => $i,
                "titulo_seccion" => "Sección " . $i,
                "created_at" => "2023-11-02 01:59:25",
                "updated_at" => "2023-11-02 01:59:25",
            ]);
        }

        \App\Models\User::factory()->create([
            'id_rol_fk' => '1',
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
        ]);
    }
}
