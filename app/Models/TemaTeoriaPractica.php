<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemaTeoriaPractica extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_tema_fk',
        'id_teoria_fk',
        'id_practica_fk',
        'id_img_fk',
        'created_at',
        'updated_at',
    ];

    /**
     * Obtiene el tema asociado a la relación.
     */
    public function tema()
    {
        return $this->belongsTo(Tema::class, 'id_tema_fk', 'id');
    }

    /**
     * Obtiene la teoría asociada a la relación.
     */
    public function teoria()
    {
        return $this->belongsTo(Teoria::class, 'id_teoria_fk', 'id');
    }

    /**
     * Obtiene la práctica asociada a la relación.
     */
    public function practica()
    {
        return $this->belongsTo(Practica::class, 'id_practica_fk', 'id');
    }

    /**
     * Obtiene la imagen asociada a la relación.
     */
    public function imagen()
    {
        return $this->belongsTo(Imagene::class, 'id_img_fk', 'id');
    }
}
