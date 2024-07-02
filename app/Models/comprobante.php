<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comprobante extends Model
{
    use HasFactory;
    public function cacecob_pagos(){
        return $this->hasMany(cacecob_pagos::class);
    }
    public function pagos(){
        return $this->hasMany(pago::class);
    }
    protected $guarded = ['id'];
}
