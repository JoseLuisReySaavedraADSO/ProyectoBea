<?php

namespace App\Models;

use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'id_rol_fk',
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

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }

    /**
     * Los atributos que deberían estar ocultos para las matrices.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deberían convertirse en tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Obtiene el perfil asociado al usuario.
     */
    public function perfil()
    {
        return $this->hasOne(Perfil::class, 'id_usuario_fk', 'id');
    }

    /**
     * Obtiene el rol asociado al usuario.
     */
    public function rol()
    {
        return $this->hasOne(Role::class, 'id', 'id_rol_fk');
    }

    /**
     * Obtiene las secciones asociadas al usuario.
     */
    public function secciones()
    {
        return $this->belongsToMany(Seccione::class, 'tb_usuarios_secciones', 'id_usuario_fk', 'id_seccion_fk');
    }
}
