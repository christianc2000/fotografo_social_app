<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $plans=[
        [
            'nombre'=>'Gratis',
            'descripcion'=>'Plan inicial de corto tiempo',
            'costo'=>0,
            'meses'=>1,
            'estado'=>'true',
            'tipo'=>'F'
        ],
        [
            'nombre'=>'Plan semestral',
            'descripcion'=>'Plan semestral para profesionales',
            'costo'=>250,
            'meses'=>6,
            'estado'=>'true',
            'tipo'=>'F'
        ],
        [
            'nombre'=>'Plan Anual',
            'descripcion'=>'Plan anual para expertos',
            'costo'=>400,
            'meses'=>12,
            'estado'=>'true',
            'tipo'=>'F'
        ],
        // PLAN ORGANIZADOR
        [
            'nombre'=>'Gratis',
            'descripcion'=>'Plan inicial de corto tiempo',
            'costo'=>0,
            'meses'=>1,
            'estado'=>'true',
            'tipo'=>'O'
        ],
        [
            'nombre'=>'Plan semestral',
            'descripcion'=>'Plan semestral para profesionales',
            'costo'=>200,
            'meses'=>6,
            'estado'=>'true',
            'tipo'=>'O'
        ],
        [
            'nombre'=>'Plan Anual',
            'descripcion'=>'Plan inicial de corto tiempo',
            'costo'=>300,
            'meses'=>12,
            'estado'=>'true',
            'tipo'=>'O'
        ],
        ];
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
