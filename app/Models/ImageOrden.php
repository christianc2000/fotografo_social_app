<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageOrden extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'costo',
        'orden_id',
        'image_id'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }

    //orden de carrito
    public function ordenCarrito()
    {
        return $this->belongsTo(Orden::class)
        ->where('tipo', Orden::CARRITO);
    }
    //orden de compra
    public function ordenCompra()
    {
        return $this->belongsTo(Orden::class)
        ->where('tipo', Orden::COMPRA);
    }
}
