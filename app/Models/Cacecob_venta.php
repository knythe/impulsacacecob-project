<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cacecob_venta extends Model
{
    use HasFactory;
    public function comprobante(){
        return $this->belongsTo(Comprobante::class);
    }
    public function cacecob_cliente(){
        return $this->belongsTo(Cacecob_cliente::class);
    }
    public function cacecob_evento(){
        return $this->belongsTo(Cacecob_evento::class);
    }
    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }
}
