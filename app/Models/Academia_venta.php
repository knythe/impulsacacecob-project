<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academia_venta extends Model
{
    use HasFactory;

    public function academia_ciclo(){
        return $this->belongsTo(Academia_ciclo::class);
    }
    public function comprobante(){
        return $this->belongsTo(Comprobante::class);
    }
    public function apoderado() {
        return $this->belongsTo(Apoderado::class);
    }
    public function estudiante() {
        return $this->belongsTo(Estudiante::class);
    }
    public function empleado() {
        return $this->belongsTo(Empleado::class);
    }
    protected $guarded = ['id'];
}
