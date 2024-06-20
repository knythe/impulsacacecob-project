<?php

namespace App\Models;
//Carbon biblioteca encargada de parsear las fechas
//use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academia_ciclo extends Model
{
    use HasFactory;

    public function academia_ventas(){
        return $this->hasMany(Academia_venta::class);
    }
    
    //protected $fillable = ['nombre_ciclo','fecha_inicio','costo','estado'];
    protected $guarded = ['id'];

    /*protected $dates = ['fecha_inicio'];

    // Definir un accesor para formatear la fecha
    public function getFechaInicioAttribute($value)
    {
        return Carbon::parse($value)->format('j-n-Y');
    }*/

    // Accesor para formatear el costo
   /* public function getCostoAttribute($value)
    {
        return 'S/. ' . number_format($value, 0, '.');
    }*/
}
