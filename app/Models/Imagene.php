<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagene extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'path',
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
        return $this->belongsTo(TemaTeoriaPractica::class, 'id_img_fk', 'id');
    }
}
