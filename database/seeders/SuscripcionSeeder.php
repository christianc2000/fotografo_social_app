<?php

namespace Database\Seeders;

use App\Models\Suscripcion;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuscripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizadores=User::where('tipo','O');
        $fotografos=User::where('tipo','F');
        foreach ($organizadores as $organizador) {
            Suscripcion::create([
                'pagado'=>true,
                'fecha_inicio'=>'2024-01-01',
                'fecha_fin'=>'2024-02-01',
                'costo'=>0,
                'user_id'=>$organizador->id,
                'plan_id'=>3
            ]);
        }
        foreach ($fotografos as $fotografo) {
            Suscripcion::create([
                'pagado'=>true,
                'fecha_inicio'=>'2024-01-01',
                'fecha_fin'=>'2024-02-01',
                'costo'=>0,
                'user_id'=>$fotografo->id,
                'plan_id'=>1
            ]);
        }
        
    }
}
