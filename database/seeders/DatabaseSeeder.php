<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void

    {

        $this->call(UserSeeder::class);
        $this->call(DashboardTableSeeder::class);
        $this->call(EventoSeeder::class);
        $this->call(EventoUserSeeder::class);
        $this->call(VinculadoSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(OrdenSeeder::class);
        $this->call(ImageOrdenSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
