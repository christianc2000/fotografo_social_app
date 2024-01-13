<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Orden extends Model
{
    use HasFactory;
    //TIPO DE ORDEN
    const CARRITO = "CARRITO DE COMPRA";
    const COMPRA = "COMPRA REALIZADA";

    //ESTADO DE ORDEN
    const RECIBIDA = "RECIBIDA";
    const CAMINO = "EN CAMINO";
    const ENTREGADA = "ENTREGADA";
    //TIPO DE ENTREGA
    const DOMICILIO = "Entrega a domicilio";
    const ONLINE = "Descarga online";
    //ESTADO DEL QR
    const VAL = "QR válido";
    const VEN = "QR vencido";
    protected $fillable = [
        'nro_orden',
        'nit',
        'direccion_envio',
        'correo_orden',
        'razon',
        'celular',
        'gps',
        'qr_pago',
        'fecha_creacion_qr',
        'fecha_orden',
        'fecha_entrega',
        'estado_orden',
        'tipo_entrega',
        'tipo',
        'total',
        'user_id'
    ];

    //relación inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relación de 1 a muchos
    public function imagenesOrden()
    {
        return $this->hasMany(ImageOrden::class);
    }
}
