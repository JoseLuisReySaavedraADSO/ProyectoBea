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
    
    public function tema()
    {
        return $this->belongsTo(Tema::class, 'id_tema_fk', 'id');
    }

    public function usuariosSecciones()
    {
        return $this->hasMany(UsuarioSeccion::class, 'id_seccion_fk', 'id');
    }
    
    public function temateoriapractica()
    {
        return $this->belongsTo(temateoriapractica::class, 'id_tema_fk', 'id');
    }
}
