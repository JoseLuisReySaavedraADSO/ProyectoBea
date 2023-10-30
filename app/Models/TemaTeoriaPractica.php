<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemaTeoriaPractica extends Model
{
    use HasFactory;

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'id_tema_fk', 'id');
    }

    public function teoria()
    {
        return $this->belongsTo(Teoria::class, 'id_teoria_fk', 'id');
    }

    public function practica()
    {
        return $this->belongsTo(Practica::class, 'id_practica_fk', 'id');
    }

    public function imagen()
    {
        return $this->belongsTo(Imagen::class, 'id_img_fk', 'id');
    }
}