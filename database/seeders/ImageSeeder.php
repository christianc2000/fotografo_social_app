<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $images=[
            [
                'titulo'=>'Campeónes del evento',
                'url'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/evento_fotografo1.jpg',
                'url_baja'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/evento_fotografo1.jpg',
                'tipo'=>Image::EVENTO,
                'precio'=>50.00,
                'categoria'=>Image::PUB,
                'user_id'=>4,
                'evento_id'=>1
            ],
            [
                'titulo'=>'Campeónes del evento',
                'url'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/evento_fotografo2.jpg',
                'url_baja'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/evento_fotografo2.jpg',
                'tipo'=>Image::EVENTO,
                'precio'=>50.00,
                'categoria'=>Image::PUB,
                'user_id'=>4,
                'evento_id'=>1
            ],
            [
                'titulo'=>'Campeónes del evento',
                'url'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/evento_fotografo3.jpeg',
                'url_baja'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/evento_fotografo3.jpeg',
                'tipo'=>Image::EVENTO,
                'precio'=>50.00,
                'categoria'=>Image::PUB,
                'user_id'=>4,
                'evento_id'=>1
            ],
            [
                'titulo'=>'Campeónes del evento',
                'url'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/evento_fotografo4.jpg',
                'url_baja'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/evento_fotografo4.jpg',
                'tipo'=>Image::EVENTO,
                'precio'=>50.00,
                'categoria'=>Image::PUB,
                'user_id'=>4,
                'evento_id'=>1
            ],
            [
                'titulo'=>'Campeónes del evento',
                'url'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/evento_fotografo5.jpg',
                'url_baja'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/evento_fotografo5.jpg',
                'tipo'=>Image::EVENTO,
                'precio'=>50.00,
                'categoria'=>Image::PUB,
                'user_id'=>4,
                'evento_id'=>1
            ],
            [
                'titulo'=>'Orquesta OSU',
                'url'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/1704205661_Evento_1.jpg',
                'url_baja'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/foto_marca_de_agua.jpg',
                'tipo'=>Image::EVENTO,
                'precio'=>50.00,
                'categoria'=>Image::PUB,
                'user_id'=>4,
                'evento_id'=>1
            ],
            [
                'titulo'=>'Orquesta OSU',
                'url'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/1704205662_Evento_1.jpg',
                'url_baja'=>'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/imagenes/1704205662_Evento_1.jpg',
                'tipo'=>Image::EVENTO,
                'precio'=>50.00,
                'categoria'=>Image::PUB,
                'user_id'=>4,
                'evento_id'=>1
            ],
        ];
        foreach ($images as $image) {
            Image::create($image);
        }
    }
}
