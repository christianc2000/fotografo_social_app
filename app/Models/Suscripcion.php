<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;

    protected $fillable=[
        'estado',
        'pagado',
        'fecha_inicio',
        'fecha_fin',
        'costo',
        'user_id',
        'plan_id'
    ];

    // relación de 1 a mucho inversa
    public function plan(){
        return $this->belongsTo(Plan::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
