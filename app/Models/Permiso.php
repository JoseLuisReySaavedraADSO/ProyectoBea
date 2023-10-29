<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',	
        'nom_perm',	
        'desc_perm',	
        'created_at',	
        'updated_at',
    ];
}
