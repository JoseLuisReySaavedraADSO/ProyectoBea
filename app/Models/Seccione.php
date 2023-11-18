<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccione extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'titulo_seccion',
        'created_at',
        'updated_at',
    ];

    /**
     * Obtiene los temas asociados a la sección.
     */
    public function tema()
    {
        return $this->hasMany(Tema::class, 'id_seccion_fk', 'id');
    }

    /**
     * Obtiene los usuarios asociados a la sección.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'tb_usuarios_secciones', 'id_seccion_fk', 'id_usuario_fk');
    }

    /**
     * Obtiene la relación con el modelo TemaTeoriaPractica.
     */
    public function temateoriapractica()
    {
        return $this->hasOne(TemaTeoriaPractica::class, 'id_seccion_fk', 'id');
    }
}
