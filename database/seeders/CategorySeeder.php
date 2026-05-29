<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Carrito'
        ]);

        Category::create([
            'name' => 'Chivitos'
        ]);



        Category::create([
            'name' => 'Empanadas'
        ]);

        Category::create([
            'name' => 'Hamburguesas'
        ]);

        Category::create([
            'name' => 'Milanesas'
        ]);

         Category::create([
            'name' => 'Panchos'
        ]);

        Category::create([
            'name' => 'Pizzas'
        ]);

        Category::create([
            'name' => 'Sin Glúten & Veganos'
        ]);

        Category::create([
            'name' => 'Viandas'
        ]);
    }
}