<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    use HasFactory;
    public function academia_ventas(){
        return $this->hasMany(academia_venta::class);
    }
    public function pagos(){
        return $this->hasMany(pago::class);
    }
    public function apoderado() {
        return $this->belongsTo(apoderado::class);
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
