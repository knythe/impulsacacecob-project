<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public function usuario() {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    public function role() {
        return $this->belongsTo(Role::class);
    }
    public function academia_ventas(){
        return $this->hasMany(Academia_venta::class);
    }
    public function cacecob_ventas(){
        return $this->hasMany(Cacecob_venta::class);
    }
    
    protected $guarded = ['id'];
}
