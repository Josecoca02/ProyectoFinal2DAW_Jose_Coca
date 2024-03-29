<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancha extends Model
{
    protected $fillable = [
        'nombre', 'localidad', 'direccion', 'precio', 'foto', 'disponibilidad'
    ];
    public function partidos()
{
    return $this->hasMany(Partido::class);
}
    use HasFactory;
}
