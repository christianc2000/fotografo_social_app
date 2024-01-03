<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VinculadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organizador = User::all()->where('tipo', 'O')->first();
        $fotografos = User::all()->where('tipo', 'F');
        foreach ($fotografos as $fotografo) {
            $organizador->fotografos()->attach($fotografo, []);
        }
    }
}
