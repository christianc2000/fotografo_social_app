<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable=[
        'nombre',
        'descripcion',
        'costo',
        'meses',
        'estado',
        'tipo'
    ];
    // relación de 1 a mucho
    public function suscripcions(){
        return $this->hasMany(Suscripcion::class);
    }
}
