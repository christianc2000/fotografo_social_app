<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fotografo = User::all()->where('tipo', 'F')->first();
        $fotografo2 = User::find(4);
        $evento = Evento::first();

        $fotografo->vinculacionEvento()->attach($evento, [
            'fecha_envio' => '2023-12-30 21:38'
        ]);
        $fotografo2->vinculacionEvento()->attach($evento, [
            'estado'=> Evento::ACEPTADO,
            'fecha_envio' => '2023-12-30 23:38',
            'fecha_aceptacion' => '2023-12-31 13:14'
        ]);

        //clientes vinculados
        $cliente1 = User::all()->where('tipo', 'C')->first();
        $cliente2 = User::all()->where('tipo', 'C')->last();
        $cliente2->vinculacionEvento()->attach($evento, [
            'estado'=> Evento::ACEPTADO,
            'fecha_envio' => '2024-01-01 09:38',
            'fecha_aceptacion' => '2024-01-01 13:14',
            'qr' => 'https://rekognitions3-bucket.s3.amazonaws.com/fotografia_app/qr/qr-1.png'
        ]);
        $cliente1->vinculacionEvento()->attach($evento, [
            'fecha_envio' => '2024-01-01 13:38',
        ]);
    }
}
