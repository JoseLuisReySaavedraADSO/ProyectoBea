<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imgene extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',	
        'path',	
        'created_at',	
        'updated_at',  
    ];
}
