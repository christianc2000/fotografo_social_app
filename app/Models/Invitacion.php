<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitacion extends Model
{
    use HasFactory;
    protected $fillable=[
        'email',
        'estado'
    ];
    
    public function evento(){
        return $this->belongsTo(Evento::class);
    }
}
