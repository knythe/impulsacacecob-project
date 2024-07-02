<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cacecob_evento extends Model
{
    use HasFactory;

    public function cacecob_ventas(){
        return $this->hasMany(cacecob_venta::class);
    }
    protected $guarded = ['id'];
}