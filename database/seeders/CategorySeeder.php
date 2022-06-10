<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Collares y correas',
                'slug' => Str::slug('Collares y correas'),
                'icon' => '<i class="fa-solid fa-paw"></i>'
            ],
            [
                'name' => 'Aseo',
                'slug' => Str::slug('Aseo'),
                'icon' => '<i class="fa-solid fa-shower"></i>'
            ],

            [
                'name' => 'Juguetes',
                'slug' => Str::slug('Juguetes'),
                'icon' => '<i class="fas fa-dice"></i>'
            ],

            [
                'name' => 'Comestibles',
                'slug' => Str::slug('Comestibles'),
                'icon' => '<i class="fa-solid fa-cookie"></i>'
            ],

            [
                'name' => 'Ansiedad',
                'slug' => Str::slug('Ansiedad'),
                'icon' => '<i class="fa-solid fa-heart-pulse"></i>'
            ],

            [
                'name' => 'Accesorios Medicos',
                'slug' => Str::slug('Accesorios Medicos'),
                'icon' => '<i class="fa-solid fa-stethoscope"></i>'
            ],

            [
                'name' => 'Accesorios',
                'slug' => Str::slug('Accesorios'),
                'icon' => '<i class="fa-solid fa-medal"></i>'
            ],

            [
                'name' => 'Ropa',
                'slug' => Str::slug('Ropa'),
                'icon' => '<i class="fas fa-tshirt"></i>'
            ],

            [
                'name' => 'Comida humeda',
                'slug' => Str::slug('Comida humeda'),
                'icon' => '<i class="fa-solid fa-bowl-food"></i>'
            ],

            [
                'name' => 'Costales',
                'slug' => Str::slug('Costales'),
                'icon' => '<i class="fa-solid fa-bacon"></i>'
            ],

        ];

        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }

    }
}
