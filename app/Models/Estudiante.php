<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    public function apoderado()
    {
        return $this->belongsTo(Apoderado::class);
    }
    public function academia_ventas()
    {
        return $this->hasMany(Academia_venta::class);
    }

    public function getSedeTextoAttribute()
    {
        $sedes = [
            0 => 'Piura',
            1 => 'Paita',
            2 => 'Sechura',
        ];

        return $sedes[$this->sede] ?? 'Desconocido';
    }


    protected $guarded = ['id'];
}
