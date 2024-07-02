<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;
    public function area() {
        return $this->belongsTo(area::class);
    }
    public function usuario(){
        return $this->belongsTo(usuario::class);
    }
    public function cacecob_ventas(){
        return $this->hasMany(cacecob_pagos::class);
    }
    public function academia_ventas(){
        return $this->hasMany(academia_venta::class);
    }
    public function academia_ciclos(){
        return $this->hasMany(academia_ciclo::class);
    }
    protected $guarded = ['id'];
}
