<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;
    public function empleados() {
        return $this->hasMany(empleado::class);
    }
    public function role() {
        return $this->belongsTo(role::class);
    }
    protected $guarded = ['id'];
}
