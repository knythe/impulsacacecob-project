<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    use HasFactory;
    public function academia_ventas(){
        return $this->hasMany(Academia_venta::class);
    }

    public function cacecob_ventas(){
        return $this->hasMany(Cacecob_venta::class);
    }
    public function getTipoPagoTextoAttribute()
    {
        $tiposPago = [
            0 => 'YAPE',
            1 => 'PLIN',
            2 => 'BCP',
        ];

        return $tiposPago[$this->tipo_pago] ?? 'Desconocido';
    }
    protected $guarded = ['id'];
}
