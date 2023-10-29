<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',	
        'titulo_teoria',	
        'desc_teoria',	
        'created_at',	
        'updated_at',
    ];
}
