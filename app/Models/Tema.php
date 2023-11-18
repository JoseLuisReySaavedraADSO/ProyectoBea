<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_seccion_fk',
        'titulo_tema',
        'created_at',
        'updated_at',
    ];

    /**
     * Obtiene la sección a la que pertenece el tema.
     */
    public function secciones()
    {
        return $this->belongsTo(Seccione::class, 'id_seccion_fk', 'id');
    }

    /**
     * Obtiene las relaciones con el modelo TemaTeoriaPractica.
     */
    public function temasTeoriaPractica()
    {
        return $this->hasMany(TemaTeoriaPractica::class, 'id_tema_fk', 'id');
    }
}
