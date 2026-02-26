<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\CartItem;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //crear usuarios
        User::factory(1000)->create();
       /* $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
        ]);*/

        //Category::factory(10000)->create();
        Product::factory(10000)->create();
        CartItem::factory(20000)->create();

    }
}
