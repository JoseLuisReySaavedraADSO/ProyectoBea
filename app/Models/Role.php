<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'nom_rol',
        'created_at',
        'updated_at',
    ];
}
