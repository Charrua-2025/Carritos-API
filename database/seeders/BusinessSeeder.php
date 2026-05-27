<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Business::create([
            'user_id' => 1,
            'category_id' => 1,
            'location_id' => 1,

            'name' => 'Pizzería Don Tito',

            'description' => 'Pizzas artesanales, muzarella y fainá.',

            'address' => 'Av. Sarandí 123',

            'latitude' => -30.89950000,
            'longitude' => -55.55020000,

            'whatsapp' => '59899911111',
            'phone' => '46220001',

            'delivery_available' => true,
            'pickup_available' => true,

            'opening_time' => '18:00:00',
            'closing_time' => '01:00:00',

            'featured' => true,

            'subscription_type' => 'premium',

            'views_count' => 120,

            'active' => true
        ]);

        Business::create([
            'user_id' => 1,
            'category_id' => 2,
            'location_id' => 2,

            'name' => 'Burger House Rivera',

            'description' => 'Hamburguesas caseras y papas fritas.',

            'address' => 'Ituzaingó 456',

            'latitude' => -30.90120000,
            'longitude' => -55.54890000,

            'whatsapp' => '59899922222',
            'phone' => '46220002',

            'delivery_available' => true,
            'pickup_available' => true,

            'opening_time' => '19:00:00',
            'closing_time' => '02:00:00',

            'featured' => true,

            'subscription_type' => 'basic',

            'views_count' => 80,

            'active' => true
        ]);

        Business::create([
            'user_id' => 1,
            'category_id' => 3,
            'location_id' => 3,

            'name' => 'Rotisería La Familia',

            'description' => 'Comida casera y viandas.',

            'address' => 'Bvar. Artigas 789',

            'latitude' => -30.90250000,
            'longitude' => -55.55100000,

            'whatsapp' => '59899933333',
            'phone' => '46220003',

            'delivery_available' => true,
            'pickup_available' => true,

            'opening_time' => '11:00:00',
            'closing_time' => '15:00:00',

            'featured' => false,

            'subscription_type' => 'free',

            'views_count' => 35,

            'active' => true
        ]);

        Business::create([
            'user_id' => 1,
            'category_id' => 4,
            'location_id' => 4,

            'name' => 'Carrito El Turco',

            'description' => 'Chivitos, hamburguesas y panchos.',

            'address' => 'Plaza Flores',

            'latitude' => -30.90300000,
            'longitude' => -55.54750000,

            'whatsapp' => '59899944444',
            'phone' => '46220004',

            'delivery_available' => false,
            'pickup_available' => true,

            'opening_time' => '20:00:00',
            'closing_time' => '04:00:00',

            'featured' => true,

            'subscription_type' => 'premium',

            'views_count' => 200,

            'active' => true
        ]);

        Business::create([
            'user_id' => 1,
            'category_id' => 5,
            'location_id' => 5,

            'name' => 'Açaí Tropical',

            'description' => 'Açaí, smoothies y postres fríos.',

            'address' => 'Centro Rivera',

            'latitude' => -30.89800000,
            'longitude' => -55.54950000,

            'whatsapp' => '59899955555',
            'phone' => '46220005',

            'delivery_available' => true,
            'pickup_available' => true,

            'opening_time' => '14:00:00',
            'closing_time' => '23:00:00',

            'featured' => false,

            'subscription_type' => 'basic',

            'views_count' => 60,

            'active' => true
        ]);
    }
}