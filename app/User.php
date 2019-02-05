<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cedula_us', 'nombres_us', 'apellidos_us', 'fecha_nacimiento_us',
        'telefono_us', 'codigo_postal_us', 'pais_us', 'provincia_us', 'ciudad_us', 'calle_uno_us', 'calle_dos_us',
        'referencia_us', 'numero_casa_us',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($us) {
            $us->password = bcrypt($us->password);
        });
    }
}
