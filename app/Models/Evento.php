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
    //estado de una vinculación CON UN USER CLIENTE O FOTOGRAFO
    const ESPERA = "EN ESPERA";
    const ACEPTADO = "ACEPTADO";
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

    public function vinculacionUser()
    {
        return $this->belongsToMany(User::class)->withPivot('fecha_envio', 'fecha_aceptacion', 'qr', 'fecha_asistencia', 'user_id', 'evento_id')->withTimestamps();
    }

    public function fotografosVinculadosEvento()
    {
        return $this->belongsToMany(User::class, 'evento_user')
            ->where('tipo', 'F')
            ->withPivot('estado','fecha_envio', 'fecha_aceptacion', 'qr', 'fecha_asistencia', 'asistencia')->withTimestamps();
    }
    public function clientesVinculadosEvento()
    {
        return $this->belongsToMany(User::class, 'evento_user')
            ->where('tipo', 'C')
            ->withPivot('estado','fecha_envio', 'fecha_aceptacion', 'qr', 'fecha_asistencia', 'asistencia')->withTimestamps();
    }
    public function clientesVinculadosEventoVinculados()
    {
        return $this->belongsToMany(User::class, 'evento_user')
            ->where('tipo', 'C')
            ->wherePivot('estado', 'ACEPTADO')
            ->withPivot('estado','fecha_envio', 'fecha_aceptacion', 'qr', 'fecha_asistencia', 'asistencia')->withTimestamps();
    }
    public function images(){
        return $this->hasMany(Image::class);
    }

    public function invitacion(){
        return $this->hasMany(Invitacion::class);
    }
}
