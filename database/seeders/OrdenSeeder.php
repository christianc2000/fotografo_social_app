<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Orden;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ordens = [
            [
                'qr_pago'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/qr/1704328052__qr_orden.png',
                'nro_orden'=>'ORDEN-129021',
                'nit' => "891838412",
                'razon' => "Sabrina Guzman Lopez",
                "celular" => "73893232",
                "gps" => "-17.82858,-63.11273",
                'direccion_envio' => "Av. siempre viva 12345678",
                'correo_orden' => 'sabrina@gmail.com',
                'estado_qr'=>Orden::USADO,
                'fecha_creacion_qr'=>'2024-01-04 11:58:00',
                'fecha_orden' => '2024-01-04 12:00:00',
                'fecha_entrega' => '2024-01-11 12:00:00',
                'estado_orden' => Orden::ENTREGADA,
                'tipo_entrega' => Orden::DOMICILIO,
                'tipo' => Orden::COMPRA,
                'total' => 50,
                'user_id' => 16
            ],
            [
                'qr_pago'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/qr/1704328052__qr_orden.png',
                'nro_orden'=>'ORDEN-298329',
                'nit' => "891838412",
                'correo_orden' => 'sabrina@gmail.com',
                'estado_qr'=>Orden::USADO,
                'fecha_creacion_qr'=>'2024-01-04 11:58:00',
                'fecha_orden' => '2024-01-04 12:00:00',
                'fecha_entrega' => '2024-01-04 12:00:00',
                'tipo_entrega' => Orden::ONLINE,
                'tipo' => Orden::COMPRA,
                'total' => 50,
                'user_id' => 16
            ],
            [
                'tipo' => Orden::CARRITO,
                'total' => 50,
                'user_id' => 16
            ],
        ];
        foreach ($ordens as $orden) {
            Orden::create($orden);
        }
    }
}
