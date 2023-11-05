<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagene extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',	
        'path',	
        'created_at',	
        'updated_at',  
    ];

    public function temasTeoriaPractica()
    {
        return $this->belongsTo(TemaTeoriaPractica::class, 'id_img_fk', 'id');
    }
}