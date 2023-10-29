<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',	
        'titulo_tema',	
        'desc_tema',	
        'created_at',	
        'updated_at',
    ];
}
