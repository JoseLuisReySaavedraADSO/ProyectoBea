<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'titulo_practica',
        'pdf_path',
        'created_at',
        'updated_at',
    ];

    /**
     * Obtener la relación con el modelo TemaTeoriaPractica.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function temasTeoriaPractica()
    {
        return $this->belongsTo(TemaTeoriaPractica::class, 'id_practica_fk', 'id');
    }
}
