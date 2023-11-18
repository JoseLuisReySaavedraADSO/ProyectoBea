<?php

namespace Database\Seeders;

use App\Models\Permiso;
use App\Models\Role;
use App\Models\Seccione;
use App\Models\Tema;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
  /**
   * Enviar semillas a la base de datos
   */
  public function run(): void
  {

    $fechaNacimiento = '2004-04-24'; // Formatea la fecha en el formato correcto

    // DB::table('permisos')->insert([
    //   ['nom_perm' => 'Editar', 'desc_perm' => 'El usuario puede editar'],
    //   ['nom_perm' => 'Visualizar', 'desc_perm' => 'El usuario puede visualizar']
    // ]);

    DB::table('roles')->insert([
      ['nom_rol' => 'Administrador'],
      ['nom_rol' => 'Aprendiz']
    ]);
    // Secciones
    // DB::table('secciones')->insert([
    //   ['id' => 1, 'titulo_seccion' => 'Alineación de Ejes'],
    //   ['id' => 2, 'titulo_seccion' => 'Mantenimiento Preventivo'],
    //   ['id' => 3, 'titulo_seccion' => 'Calibración de Instrumentos'],
    //   ['id' => 4, 'titulo_seccion' => 'Mantenimiento Predictivo'],
    //   ['id' => 5, 'titulo_seccion' => 'Control de Calidad'],
    //   ['id' => 6, 'titulo_seccion' => 'Seguridad en el Trabajo'],
    //   ['id' => 7, 'titulo_seccion' => 'Gestión de Proyectos'],
    //   ['id' => 8, 'titulo_seccion' => 'Automatización Industrial'],
    //   ['id' => 9, 'titulo_seccion' => 'Control de Procesos'],
    //   ['id' => 10, 'titulo_seccion' => 'Diseño de Software'],
    //   ['id' => 11, 'titulo_seccion' => 'Ingeniería Eléctrica'],
    //   ['id' => 12, 'titulo_seccion' => 'Redes de Comunicación'],
    //   ['id' => 13, 'titulo_seccion' => 'Automatización Residencial'],
    // ]);


    // DB::table('temas')->insert([
    //   ['id' => 1, 'id_seccion_fk' => 1, 'titulo_tema' => 'Alineación Axial'],
    //   ['id' => 2, 'id_seccion_fk' => 1, 'titulo_tema' => 'Alineación Radial'],
    //   ['id' => 3, 'id_seccion_fk' => 1, 'titulo_tema' => 'Alineación Angular'],
    //   ['id' => 4, 'id_seccion_fk' => 2, 'titulo_tema' => 'Programación de Mantenimiento'],
    //   ['id' => 5, 'id_seccion_fk' => 2, 'titulo_tema' => 'Inspección Visual'],
    //   ['id' => 6, 'id_seccion_fk' => 3, 'titulo_tema' => 'Conceptos de Calibración'],
    //   ['id' => 7, 'id_seccion_fk' => 4, 'titulo_tema' => 'Análisis de Vibraciones'],
    //   ['id' => 8, 'id_seccion_fk' => 4, 'titulo_tema' => 'Termografía'],
    //   ['id' => 9, 'id_seccion_fk' => 5, 'titulo_tema' => 'Control Estadístico de Procesos'],
    //   ['id' => 10, 'id_seccion_fk' => 6, 'titulo_tema' => 'Normativas de Seguridad'],
    //   ['id' => 11, 'id_seccion_fk' => 7, 'titulo_tema' => 'Planificación de Proyectos'],
    //   ['id' => 12, 'id_seccion_fk' => 7, 'titulo_tema' => 'Gestión de Recursos'],
    //   ['id' => 13, 'id_seccion_fk' => 8, 'titulo_tema' => 'PLC Programación'],
    //   ['id' => 14, 'id_seccion_fk' => 8, 'titulo_tema' => 'Robótica Industrial'],
    //   ['id' => 15, 'id_seccion_fk' => 9, 'titulo_tema' => 'Control PID'],
    //   ['id' => 16, 'id_seccion_fk' => 10, 'titulo_tema' => 'Arquitectura de Software'],
    //   ['id' => 17, 'id_seccion_fk' => 10, 'titulo_tema' => 'Desarrollo Ágil'],
    //   ['id' => 18, 'id_seccion_fk' => 11, 'titulo_tema' => 'Circuitos Eléctricos'],
    //   ['id' => 19, 'id_seccion_fk' => 11, 'titulo_tema' => 'Electrónica de Potencia'],
    // ]);


    // DB::table('teorias')->insert([
    //   ['id' => 1, 'titulo_teoria' => 'Alineación Axial Comun', 'desc_teoria' => 'Teoría detallada sobre la alineación axial.'],
    //   ['id' => 2, 'titulo_teoria' => 'Alineación Radial', 'desc_teoria' => 'Teoría de alineación radial en máquinas rotativas.'],
    //   ['id' => 3, 'titulo_teoria' => 'Programación de Mantenimiento', 'desc_teoria' => 'Conceptos y estrategias de programación de mantenimiento.'],
    //   ['id' => 4, 'titulo_teoria' => 'Análisis de Vibraciones', 'desc_teoria' => 'Teoría sobre el análisis de vibraciones en maquinaria.'],
    //   ['id' => 5, 'titulo_teoria' => 'Control Estadístico de Procesos', 'desc_teoria' => 'Principios teóricos del control estadístico de procesos.'],
    //   ['id' => 6, 'titulo_teoria' => 'Seguridad en el Trabajo', 'desc_teoria' => 'Teoría de las normativas de seguridad laboral.'],
    //   ['id' => 7, 'titulo_teoria' => 'Planificación de Proyectos', 'desc_teoria' => 'Teoría de planificación de proyectos.'],
    //   ['id' => 8, 'titulo_teoria' => 'Robótica Industrial', 'desc_teoria' => 'Teoría de la robótica en el ámbito industrial.'],
    //   ['id' => 9, 'titulo_teoria' => 'Control PID', 'desc_teoria' => 'Teoría sobre el control PID en procesos industriales.'],
    //   ['id' => 10, 'titulo_teoria' =>  'Diseño de Software', 'desc_teoria' => 'Teoría sobre diseño de software.'],
    //   ['id' => 11, 'titulo_teoria' =>  'Ingeniería de Control', 'desc_teoria' => 'Teoría de ingeniería de control.'],
    //   ['id' => 12, 'titulo_teoria' =>  'Redes de Comunicación', 'desc_teoria' => 'Teoría sobre redes de comunicación.'],
    //   ['id' => 13, 'titulo_teoria' =>  'Automatización Residencial', 'desc_teoria' => 'Teoría sobre automatización en el hogar.'],
    //   ['id' => 14, 'titulo_teoria' => 'Alineación Axial Avanzada', 'desc_teoria' => 'Teoría detallada sobre la alineación axial Avanzada.'],
    //   ['id' => 15, 'titulo_teoria' => 'Alineación Axial De Rodamientos', 'desc_teoria' => 'Teoría detallada sobre la alineación axial de rodamientos.'],
    // ]);

    // DB::table('imagenes')->insert([
    //   ['id' => 1, 'path' => 'path/imagen1.jpg'],
    //   ['id' => 2, 'path' => 'path/imagen2.jpg'],
    //   ['id' => 3, 'path' => 'path/imagen3.jpg'],
    //   ['id' => 4, 'path' => 'path/imagen4.jpg'],
    //   ['id' => 5, 'path' => 'path/imagen5.jpg'],
    //   ['id' => 6, 'path' => 'path/imagen6.jpg'],
    //   ['id' => 7, 'path' => 'path/imagen7.jpg'],
    // ]);

    // DB::table('practicas')->insert([
    //   ['id' => 1, 'titulo_practica' => 'Práctica 1', 'created_at' => now(), 'updated_at' => now()],
    // ]);

    // DB::table('tema_teoria_practicas')->insert([
    //   ['id_tema_fk' => 1, 'id_teoria_fk' => 1, 'id_practica_fk' => 1, 'id_img_fk' => 1],
    //   ['id_tema_fk' => 1, 'id_teoria_fk' => 14, 'id_practica_fk' => 1, 'id_img_fk' => 1],
    //   ['id_tema_fk' => 1, 'id_teoria_fk' => 15, 'id_practica_fk' => 1, 'id_img_fk' => 1],
    //   ['id_tema_fk' => 2, 'id_teoria_fk' => 2, 'id_practica_fk' => 1, 'id_img_fk' => 2],
    //   ['id_tema_fk' => 3, 'id_teoria_fk' => 3, 'id_practica_fk' => 1,  'id_img_fk' => 3,],
    //   ['id_tema_fk' => 4, 'id_teoria_fk' => 3, 'id_practica_fk' => 1,  'id_img_fk' => 3,],
    //   ['id_tema_fk' => 5, 'id_teoria_fk' => 2, 'id_practica_fk' => 1,  'id_img_fk' => 2,],
    //   ['id_tema_fk' => 6, 'id_teoria_fk' => 1, 'id_practica_fk' => 1,  'id_img_fk' => 1,],
    //   ['id_tema_fk' => 7, 'id_teoria_fk' => 4, 'id_practica_fk' => 1,  'id_img_fk' => 4,],
    //   ['id_tema_fk' => 8, 'id_teoria_fk' => 4, 'id_practica_fk' => 1,  'id_img_fk' => 5,],
    //   ['id_tema_fk' => 9, 'id_teoria_fk' => 5, 'id_practica_fk' => 1,  'id_img_fk' => 6,],
    //   ['id_tema_fk' => 10, 'id_teoria_fk' =>  6, 'id_practica_fk' =>  1, 'id_img_fk' =>  7,],
    //   ['id_tema_fk' => 11, 'id_teoria_fk' =>  7, 'id_practica_fk' =>  1, 'id_img_fk' =>  4,],
    //   ['id_tema_fk' => 12, 'id_teoria_fk' =>  7, 'id_practica_fk' =>  1, 'id_img_fk' =>  5,],
    //   ['id_tema_fk' => 13, 'id_teoria_fk' =>  8, 'id_practica_fk' =>  1, 'id_img_fk' =>  6,],
    // ]);

    \App\Models\User::factory()->create([
      'id_rol_fk' => '1',
      'nombre' => 'Jose Rey',
      'telefono' => '3013685277',
      'num_doc' => '1096538133',
      'tipo_doc' => 'CC',
      'email' => 'joslrey@misena.edu.co',
      'correo_alt' => 'reysaavedra123@gmail.com',
      'regional' => 'Santander',
      'fecha_nac' => $fechaNacimiento,
      'centro_form' => 'Centro Industrial de Mantenimiento Integral',
      'password' => '$2y$10$Q5x3zLabszTlwIXIolIBkuALFxT8bpPdrSWMQSWj5ivmFLIhKPUV2',
    ]);

    $fechaNacimiento = '2005-04-15';

    \App\Models\User::factory()->create([
      'id_rol_fk' => '1',
      'nombre' => 'Zulay Ortegon',
      'telefono' => '3175300440',
      'num_doc' => '1095300976',
      'tipo_doc' => 'Cédula de ciudadanía',
      'email' => 'znortegon@soy.sena.edu.co',
      'correo_alt' => 'zulyortegon15@gmail.com',
      'regional' => 'Santander',
      'fecha_nac' => $fechaNacimiento,
      'centro_form' => 'Centro Industrial de Mantenimiento Integral',
      'password' => '$2y$10$jwi49y7kfCS6vsBQftTDhuJZSnnJSCvZKwhg0pHyJkSaPQpRdLZMC',
    ]);
  }
}
