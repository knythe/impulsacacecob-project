<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    use HasFactory;
    public function empleados(){
        return $this->hasMany(empleado::class);
    }
    protected $guarded = ['id'];
}
