<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $guarded = ['id'];

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Método para obtener la contraseña
    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    // Si necesitas notificaciones
    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }
}



