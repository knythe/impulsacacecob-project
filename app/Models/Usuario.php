<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public function empleado(){
        return $this->hasOne(Empleado::class);
    }
    
    

    protected $guarded = ['id'];
}
