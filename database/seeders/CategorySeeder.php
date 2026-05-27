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
    'name' => 'Desayunos'
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
    'name' => 'Minutas'
]);

Category::create([
    'name' => 'Panchos'
]);

Category::create([
    'name' => 'Pizzas'
]);

Category::create([
    'name' => 'Rotiseria'
]);

Category::create([
    'name' => 'Sin Glúten'
]);

Category::create([
    'name' => 'Veganos'
]);

Category::create([
    'name' => 'Vegetarianos'
]);

Category::create([
    'name' => 'Viandas'
]);

    }
}