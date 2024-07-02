<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class academia_ciclo extends Model
{
    use HasFactory;
    /*Es un método de Eloquent (el ORM de Laravel) que define una relación 
    de uno a muchos. Esto significa que el modelo actual (la clase que contiene este método)
     puede tener múltiples registros asociados en la tabla del modelo relacionado.*/

    public function academia_ventas(){
        return $this->hasMany(academia_venta::class);
    }
    public function empleado() {
        return $this->belongsTo(empleado::class);
    }
    protected $guarded = ['id'];
}
