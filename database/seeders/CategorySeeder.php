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
        $category1 = new Category();
        $category1->name = 'Electrodomesticos';
        $category1->description = "Esta es la desctipción del electrodomestico";
        
        $category1->save();

        $category2 = new Category();
        $category2->name = 'Tecnología';
        $category2->description = "Esta es la desctipción de la Tecnología";

        $category2->save();
    }
}
