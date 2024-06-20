<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cacecob_cliente extends Model
{
    use HasFactory;
    public function cacecob_ventas(){
        return $this->hasMany(Cacecob_venta::class);
    }

}
