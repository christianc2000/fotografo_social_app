<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    //Tipo de imagen
    const FOTOGRAFO = "PERTENECE AL FOTOGRAFO";
    const EVENTO = "PERTENECE AL EVENTO";
    //Categoria de imagen
    const PUB = "PUBLICO";
    const PRIV = "PRIVADO";
    protected $fillable = [
        'titulo',
        'estado',
        'analizado',
        'url',
        'url_baja',
        'tipo',
        'precio',
        'cantidad_vendido',
        'categoria',
        'clientes',
        'user_id',
        'evento_id'
    ];
    protected $table = "images";
    //relación 1 a mucho inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
