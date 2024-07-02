<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apoderado extends Model
{
    use HasFactory;
    public function estudiantes()
    {
        return $this->hasMany(estudiante::class);
    }

    public function getParentescosTextoAttribute()
    {
        $parentescos = [
            0 => 'Hermano(a)',
            1 => 'Primo(a)',
            2 => 'Tio(a)',
            3 => 'Abuelo(a)',
            4 => 'Papá',
            5 => 'Mamá',
            6 => 'Cuñado(a)',
            7 => 'Recomendado(a)',
        ];

        return $parentescos[$this->parentesco] ?? 'Desconocido';
    }

    protected $guarded = ['id'];
}
