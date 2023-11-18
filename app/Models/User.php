<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',	
        'id_rol_fk'	,
        'nombre',	
        'telefono',	
        'num_doc',	
        'tipo_doc',	
        'email',	
        'correo_alt',	
        'regional',
        'fecha_nac',	
        'centro_form',	
        'email_verified_at',	
        'password',	
        'remember_token',
        'created_at',	
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function perfil()
    {
        return $this->hasOne(Perfil::class, 'id_usuario_fk', 'id');
    }

    public function rol()
    {
        return $this->hasOne(Role::class, 'id', 'id_rol_fk');
    }

    public function secciones()
    {
        return $this->belongsToMany(Seccione::class, 'tb_usuarios_secciones', 'id_usuario_fk', 'id_seccion_fk');
    }
    
}
