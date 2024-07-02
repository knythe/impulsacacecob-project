<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    public function usuarios() {
        return $this->hasMany(usuario::class);
    }
    protected $guarded = ['id'];
}
