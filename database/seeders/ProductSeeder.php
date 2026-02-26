<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = new Product();
        $product1->name = 'Play Station 5';
        $product1->description = "Esta es la descripción del Play Station 5";
        $product1->price = 499.99;
        $product1->category_id = 2; # Asumiendo que el ID de la categoría 'Tecnología' es 2
        
        $product1->save();

        $product2 = new Product();
        $product2->name = 'Refrigerador';
        $product2->description = "Esta es la descripción del Refrigerador";
        $product2->price = 899.99;
        $product2->category_id = 1; # Asumiendo que el ID de la categoría 'Electrodomesticos' es 1

        $product2->save();

        $product3 = new Product();
        $product3->name = 'Laptop';
        $product3->description = "Esta es la descripción de la Laptop";
        $product3->price = 1299.99;
        $product3->category_id = 2; # Asumiendo que el ID de la categoría 'Tecnología' es 2

        $product3->save();
    }
}
