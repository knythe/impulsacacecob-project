<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cacecob_venta extends Model
{
    use HasFactory;
    public function cacecob_pago() {
        return $this->belongsTo(cacecob_pagos::class);
    }
    public function cacecob_cliente() {
        return $this->belongsTo(cacecob_cliente::class);
    }
    public function empleado() {
        return $this->belongsTo(empleado::class);
    }
    public function cacecob_evento() {
        return $this->belongsTo(cacecob_evento::class);
    }

}
