<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccione extends Model
{
  use HasFactory;

  protected $fillable = [
    'id',
    'titulo_seccion',
    'created_at',
    'updated_at',
  ];

  public function tema()
  {
    return $this->hasMany(Tema::class, 'id_seccion_fk', 'id');
  }

  public function users()
  {
      return $this->belongsToMany(User::class, 'tb_usuarios_secciones', 'id_seccion_fk', 'id_usuario_fk');
  }

  public function temateoriapractica()
  {
    return $this->hasOne(TemaTeoriaPractica::class, 'id_seccion_fk', 'id');
  }
}


// if ($vistas) {
//   $user->secciones()->attach($vistas);
// }