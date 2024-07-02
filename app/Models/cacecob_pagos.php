<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cacecob_pagos extends Model
{
    use HasFactory;
    public function cacecob_ventas(){
        return $this->hasMany(cacecob_venta::class);
    }
    public function comprobante() {
        return $this->belongsTo(comprobante::class);
    }
    protected $guarded = ['id'];
}
