<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cacecob_cliente extends Model
{
    use HasFactory;
    public function cacecob_ventas(){
        return $this->hasMany(cacecob_venta::class);
    }

    public function cacecob_pagos(){
        return $this->hasMany(cacecob_pagos::class);
    }
    protected $guarded = ['id'];
}
