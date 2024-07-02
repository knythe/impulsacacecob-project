<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    use HasFactory;
    public function comprobante() {
        return $this->belongsTo(comprobante::class);
    }
    public function estudiante() {
        return $this->belongsTo(estudiante::class);
    }
    public function academia_ventas() {
        return $this->hasMany(academia_venta::class);
    }
    protected $guarded = ['id'];
}
