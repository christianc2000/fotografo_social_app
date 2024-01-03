<?php

namespace Database\Seeders;

use App\Models\ImageOrden;
use App\Models\Orden;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageOrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ordens = Orden::all();

        foreach ($ordens as $orden) {
            if ($orden->tipo == Orden::COMPRA) {
                ImageOrden::create([
                    'url' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/1704205662_Evento_1.jpg',
                    'costo' => 50,
                    'orden_id' => $orden->id,
                    'image_id' => 7
                ]);
            } else if ($orden->tipo == Orden::CARRITO) {
                ImageOrden::create([
                    'url' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/foto_marca_de_agua.jpg',
                    'costo' => 50,
                    'orden_id' => $orden->id,
                    'image_id' => 6
                ]);
            }
        }
    }
}
