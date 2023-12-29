<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    const VIGENTE = "VIGENTE";
    const CURSO = "EN CURSO";
    const FINALIZADO = "FINALIZADO";
    const CANCELADO = "CANCELADO";

    protected $fillable = [
        'titulo',
        'descripcion',
        'direccion',
        'gps',
        'img_evento',
        'fecha_evento',
        'estado',
        'user_id'
    ];

    //relación de 1 a muchos
    
    //relación de 1 a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
