<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'city' => 'Rivera',
            'name' => 'Barrio Bisio'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Caqueiro'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Centro'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Cerro del Marco'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Cuartel'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'La Pedrera'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'La Racca'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'La Virgencita'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Linea divisoria'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Mandubí'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Misiones'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Plaza Artigas'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Plaza Flores'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Plaza Internacional'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Pueblo Nuevo'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Quintas al Norte'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Rivera Chico'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Sacrificio de Sonia'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Santa Isabel'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Santa Teresa'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Villa Sara'
        ]);

        Location::create([
            'city' => 'Rivera',
            'name' => 'Villa Sonia'
        ]);
    }
}