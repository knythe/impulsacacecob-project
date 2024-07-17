<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class academia_venta extends Model
{
    use HasFactory;
    public function academia_ciclo(){
        return $this->belongsTo(academia_ciclo::class,'ciclo_id');
    }
    public function pago(){
        return $this->belongsTo(pago::class);
    }
    public function estudiante() {
        return $this->belongsTo(estudiante::class);
    }
    public function empleado() {
        return $this->belongsTo(empleado::class);
    }
    protected $guarded = ['id'];
}
