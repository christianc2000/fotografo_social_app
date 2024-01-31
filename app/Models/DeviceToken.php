<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceToken extends Model
{
    use HasFactory;
    protected $fillable=[
        'token',
        'user_id'
    ];

    // Relación de 1 a muchos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }

}
