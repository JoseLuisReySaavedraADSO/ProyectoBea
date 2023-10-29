<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccione extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',	
        'id_tema_fk',	
        'titulo_seccion',	
        'created_at',	
        'updated_at',
    ];
}
