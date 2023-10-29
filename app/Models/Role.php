<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',	
        'nom_rol',	
        'id_permiso_fk',	
        'created_at',	
        'updated_at',	
    ];
}
