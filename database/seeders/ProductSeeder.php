<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $someProducts = [ 
            [
                'name' => 'Coca Cola 600ml',
                'brand' => 'Coca Cola',
                'sale_price' => 12,
                'acquisition_price' => 10,
                'stock' => 20,                
            ],
            [
                'name' => 'Sabritas Saladas 54grs',
                'brand' => 'Sabritas',
                'sale_price' => 13,
                'acquisition_price' => 10,
                'stock' => 20,                
            ],
            [
                'name' => 'Ruffles Queso 54grs',
                'brand' => 'Sabritas',
                'sale_price' => 15,
                'acquisition_price' => 10,
                'stock' => 20,                
            ],

            [
                'name' => 'Galletas Marias 112grs',
                'brand' => 'Gamesa',
                'sale_price' => 20,
                'acquisition_price' => 7,
                'stock' => 20,                
            ],
        ];

        foreach ($someProducts as $item) {
            Product::create($item);
        }
    }
}
