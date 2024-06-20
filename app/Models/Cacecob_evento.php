<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cacecob_evento extends Model
{
    use HasFactory;
    public function cacecob_ventas(){
        return $this->hasMany(Cacecob_venta::class);
    }
    protected $guarded = ['id'];
    /*protected $dates = ['fecha_programada'];

    // Definir un accesor para formatear la fecha
    public function getFechaProgramadaAttribute($value)
    {
        return Carbon::parse($value)->format('j/n/Y');
    }*/

    // Accesor para formatear el costo
    /*public function getCostoAttribute($value)
    {
        return 'S/. ' . number_format($value, 0, '.');
    }*/
}
