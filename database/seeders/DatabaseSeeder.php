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
     * Seed the application's database.
     */
    public function run(): void
    {

        $fechaNacimiento = '2004-04-24'; // Formatea la fecha en el formato correcto

        DB::table('permisos')->insert([
            ['nom_perm' => 'Editar', 'desc_perm' => 'El usuario puede editar'],
            ['nom_perm' => 'Visualizar', 'desc_perm' => 'El usuario puede visualizar']
        ]);

        DB::table('roles')->insert([
            ['nom_rol' => 'Administrador', 'id_permiso_fk' => '1'],
            ['nom_rol' => 'Aprendiz', 'id_permiso_fk' => '2']
        ]);

        DB::table('temas')->insert([
            ['id' => 1, 'titulo_tema' => 'Alineación de Ejes'],
            ['id' => 2, 'titulo_tema' => 'Mantenimiento Preventivo'],
            ['id' => 3, 'titulo_tema' => 'Calibración de Instrumentos'],
            ['id' => 4, 'titulo_tema' => 'Mantenimiento Predictivo'],
            ['id' => 5, 'titulo_tema' => 'Control de Calidad'],
            ['id' => 6, 'titulo_tema' => 'Seguridad en el Trabajo'],
            ['id' => 7, 'titulo_tema' => 'Gestión de Proyectos'],
            ['id' => 8, 'titulo_tema' => 'Automatización Industrial'],
            ['id' => 9, 'titulo_tema' => 'Control de Procesos'],
            ['id' => 10, 'titulo_tema' => 'Diseño de Software'],
            ['id' => 11, 'titulo_tema' => 'Ingeniería Eléctrica'],
            ['id' => 12, 'titulo_tema' => 'Redes de Comunicación'],
            ['id' => 13, 'titulo_tema' => 'Automatización Residencial'],
        ]);

        // Secciones
        DB::table('secciones')->insert([
            ['id' => 1, 'id_tema_fk' => 1, 'titulo_seccion' => 'Alineación Axial', 'desc_seccion' => 'Conceptos básicos de alineación axial.' ],
            ['id' => 2, 'id_tema_fk' => 1, 'titulo_seccion' => 'Alineación Radial', 'desc_seccion' => 'Técnicas de alineación radial en maquinaria.' ],
            ['id' => 3, 'id_tema_fk' => 1, 'titulo_seccion' => 'Alineación Angular', 'desc_seccion' => 'Alineación angular en sistemas mecánicos.' ],
            ['id' => 4, 'id_tema_fk' => 2, 'titulo_seccion' => 'Programación de Mantenimiento', 'desc_seccion' => 'Planificación de mantenimiento preventivo.' ],
            ['id' => 5, 'id_tema_fk' => 2, 'titulo_seccion' => 'Inspección Visual', 'desc_seccion' => 'Procedimientos de inspección visual en mantenimiento.' ],
            ['id' => 6, 'id_tema_fk' => 3, 'titulo_seccion' => 'Conceptos de Calibración', 'desc_seccion' => 'Principios de calibración de instrumentos.' ],
            ['id' => 7, 'id_tema_fk' => 4, 'titulo_seccion' => 'Análisis de Vibraciones', 'desc_seccion' => 'Mantenimiento predictivo mediante análisis de vibraciones.' ],
            ['id' => 8, 'id_tema_fk' => 4, 'titulo_seccion' => 'Termografía', 'desc_seccion' => 'Uso de termografía en mantenimiento predictivo.' ],
            ['id' => 9, 'id_tema_fk' => 5, 'titulo_seccion' => 'Control Estadístico de Procesos', 'desc_seccion' => 'Métodos para controlar la calidad en procesos.' ],
            ['id' => 10, 'id_tema_fk' => 6, 'titulo_seccion' => 'Normativas de Seguridad', 'desc_seccion' => 'Regulaciones de seguridad en el lugar de trabajo.' ],
            ['id' => 11, 'id_tema_fk' => 7, 'titulo_seccion' => 'Planificación de Proyectos', 'desc_seccion' => 'Etapas de planificación de proyectos.' ],
            ['id' => 12, 'id_tema_fk' => 7, 'titulo_seccion' => 'Gestión de Recursos', 'desc_seccion' => 'Recursos humanos y materiales en proyectos.' ],
            ['id' => 13, 'id_tema_fk' => 8, 'titulo_seccion' => 'PLC Programación', 'desc_seccion' => 'Programación de Controladores Lógicos Programables.' ],
            ['id' => 14, 'id_tema_fk' => 8, 'titulo_seccion' => 'Robótica Industrial', 'desc_seccion' => 'Aplicaciones de robótica en la industria.' ],
            ['id' => 15, 'id_tema_fk' => 9, 'titulo_seccion' => 'Control PID', 'desc_seccion' => 'Control Proporcional-Integral-Derivativo en procesos.' ],
            ['id' => 16, 'id_tema_fk' => 10, 'titulo_seccion' => 'Arquitectura de Software', 'desc_seccion' => 'Conceptos de arquitectura de software.' ],
            ['id' => 17, 'id_tema_fk' => 10, 'titulo_seccion' => 'Desarrollo Ágil', 'desc_seccion' => 'Metodologías de desarrollo ágil.' ],
            ['id' => 18, 'id_tema_fk' => 11, 'titulo_seccion' => 'Circuitos Eléctricos', 'desc_seccion' => 'Principios de circuitos eléctricos.' ],
            ['id' => 19, 'id_tema_fk' => 11, 'titulo_seccion' => 'Electrónica de Potencia', 'desc_seccion' => 'Componentes electrónicos de potencia.' ],
        ]);

        DB::table('teorias')->insert([
            ['id' => 1, 'titulo_teoria' => 'Alineación Axial Comun', 'desc_teoria' => 'Teoría detallada sobre la alineación axial.'],
            ['id' => 2, 'titulo_teoria' => 'Alineación Radial', 'desc_teoria' => 'Teoría de alineación radial en máquinas rotativas.'],
            ['id' => 3, 'titulo_teoria' => 'Programación de Mantenimiento', 'desc_teoria' => 'Conceptos y estrategias de programación de mantenimiento.'],
            ['id' => 4, 'titulo_teoria' => 'Análisis de Vibraciones', 'desc_teoria' => 'Teoría sobre el análisis de vibraciones en maquinaria.'],
            ['id' => 5, 'titulo_teoria' => 'Control Estadístico de Procesos', 'desc_teoria' => 'Principios teóricos del control estadístico de procesos.'],
            ['id' => 6, 'titulo_teoria' => 'Seguridad en el Trabajo', 'desc_teoria' => 'Teoría de las normativas de seguridad laboral.'],
            ['id' => 7, 'titulo_teoria' => 'Planificación de Proyectos', 'desc_teoria' => 'Teoría de planificación de proyectos.'],
            ['id' => 8, 'titulo_teoria' => 'Robótica Industrial', 'desc_teoria' => 'Teoría de la robótica en el ámbito industrial.'],
            ['id' => 9, 'titulo_teoria' => 'Control PID', 'desc_teoria' => 'Teoría sobre el control PID en procesos industriales.'],
            ['id' => 10,'titulo_teoria' =>  'Diseño de Software', 'desc_teoria' => 'Teoría sobre diseño de software.'],
            ['id' => 11,'titulo_teoria' =>  'Ingeniería de Control', 'desc_teoria' => 'Teoría de ingeniería de control.'],
            ['id' => 12,'titulo_teoria' =>  'Redes de Comunicación', 'desc_teoria' => 'Teoría sobre redes de comunicación.'],
            ['id' => 13,'titulo_teoria' =>  'Automatización Residencial', 'desc_teoria' => 'Teoría sobre automatización en el hogar.'],
            ['id' => 14, 'titulo_teoria' => 'Alineación Axial Avanzada', 'desc_teoria' => 'Teoría detallada sobre la alineación axial Avanzada.'],
            ['id' => 15, 'titulo_teoria' => 'Alineación Axial De Rodamientos', 'desc_teoria' => 'Teoría detallada sobre la alineación axial de rodamientos.'],
        ]);

        DB::table('imagenes')->insert([
            ['id' => 1, 'path' => 'path/imagen1.jpg'],
            ['id' => 2, 'path' => 'path/imagen2.jpg'],
            ['id' => 3, 'path' => 'path/imagen3.jpg'],
            ['id' => 4, 'path' => 'path/imagen4.jpg'],
            ['id' => 5, 'path' => 'path/imagen5.jpg'],
            ['id' => 6, 'path' => 'path/imagen6.jpg'],
            ['id' => 7, 'path' => 'path/imagen7.jpg'],
        ]);

        DB::table('practicas')->insert([
            ['id' => 1, 'titulo_practica' => 'Práctica 1', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('tema_teoria_practicas')->insert([
            ['id_tema_fk' => 1, 'id_teoria_fk' => 1, 'id_practica_fk' => 1, 'id_img_fk' => 1],
            ['id_tema_fk' => 1, 'id_teoria_fk' => 14, 'id_practica_fk' => 1, 'id_img_fk' => 1],
            ['id_tema_fk' => 1, 'id_teoria_fk' => 15, 'id_practica_fk' => 1, 'id_img_fk' => 1],
            ['id_tema_fk' => 2, 'id_teoria_fk' => 2, 'id_practica_fk' => 1, 'id_img_fk' => 2],
            ['id_tema_fk' => 3, 'id_teoria_fk' => 3, 'id_practica_fk' => 1,  'id_img_fk' => 3, ],
            ['id_tema_fk' => 4, 'id_teoria_fk' => 3, 'id_practica_fk' => 1,  'id_img_fk' => 3, ],
            ['id_tema_fk' => 5, 'id_teoria_fk' => 2, 'id_practica_fk' => 1,  'id_img_fk' => 2, ],
            ['id_tema_fk' => 6, 'id_teoria_fk' => 1, 'id_practica_fk' => 1,  'id_img_fk' => 1, ],
            ['id_tema_fk' => 7, 'id_teoria_fk' => 4, 'id_practica_fk' => 1,  'id_img_fk' => 4, ],
            ['id_tema_fk' => 8, 'id_teoria_fk' => 4, 'id_practica_fk' => 1,  'id_img_fk' => 5, ],
            ['id_tema_fk' => 9, 'id_teoria_fk' => 5, 'id_practica_fk' => 1,  'id_img_fk' => 6, ],
            ['id_tema_fk' => 10,'id_teoria_fk' =>  6,'id_practica_fk' =>  1, 'id_img_fk' =>  7,],
            ['id_tema_fk' => 11,'id_teoria_fk' =>  7,'id_practica_fk' =>  1, 'id_img_fk' =>  4,], 
            ['id_tema_fk' => 12,'id_teoria_fk' =>  7,'id_practica_fk' =>  1, 'id_img_fk' =>  5,], 
            ['id_tema_fk' => 13,'id_teoria_fk' =>  8,'id_practica_fk' =>  1, 'id_img_fk' =>  6,], 
        ]);

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
