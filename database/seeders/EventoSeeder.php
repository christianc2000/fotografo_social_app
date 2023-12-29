<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizador = User::organizadors();
        $eventos = [
            [
                'titulo' => "Evento 1",
                'descripcion' => "Descripcion del evento 1",
                'direccion' => "Calle siempre viva 123",
                'gps' => "-17.82858,-63.11273",
                'img_evento' => "https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/evento/evento1_evento.png",
                'fecha_evento' => "2023-12-30 19:00:00",
                'user_id' => $organizador->first()->id
            ],
            [
                'titulo' => "Evento 2",
                'descripcion' => "Descripcion del evento 2",
                'direccion' => "Calle siempre viva 123",
                'gps' => "-17.82858,-63.11273",
                'img_evento' => "https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/evento/evento2_evento.png",
                'fecha_evento' => "2023-12-31 12:00:00",
                'user_id' => $organizador->first()->id
            ],
            [
                'titulo' => "Evento 3",
                'descripcion' => "Descripcion del evento 3",
                'direccion' => "Calle siempre viva 123",
                'gps' => "-17.82858,-63.11273",
                'estado'=> Evento::CANCELADO,
                'img_evento' => "https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/evento/evento3_evento.jpeg",
                'fecha_evento' => "2023-12-31 21:00:00",
                'user_id' => $organizador->first()->id
            ],
            [
                'titulo' => "Evento 4",
                'descripcion' => "Descripcion del evento 2",
                'direccion' => "Calle siempre viva 123",
                'gps' => "-17.82858,-63.11273",
                'estado'=> Evento::FINALIZADO,
                'img_evento' => "https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/evento/evento4_evento.jpg",
                'fecha_evento' => "2023-12-31 12:00:00",
                'user_id' => $organizador->first()->id
            ]
        ];

        foreach ($eventos as $evento) {
            Evento::create($evento);
        }
    }
}
