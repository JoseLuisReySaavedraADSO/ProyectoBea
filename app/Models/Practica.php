<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',	
        'titulo_practica',
        'pdf_path',	
        'created_at',	
        'updated_at',
    ];

    public function temasTeoriaPractica()
    {
        return $this->belongsTo(TemaTeoriaPractica::class, 'id_practica_fk', 'id');
    }
}
