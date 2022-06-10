<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            [
                'category_id' => 1,
                'name' => 'Collares',
                'slug' => Str::slug('Collares'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 1,
                'name' => 'Correa',
                'slug' => Str::slug('Correa'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 1,
                'name' => 'Mochilas',
                'slug' => Str::slug('Mochilas'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 1,
                'name' => 'Pecheras',
                'slug' => Str::slug('Pecheras'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 1,
                'name' => 'Cepillo',
                'slug' => Str::slug('Cepillo'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 2,
                'name' => 'Palas',
                'slug' => Str::slug('Palas'),
            ],
            [
                'category_id' => 2,
                'name' => 'Corta uñas',
                'slug' => Str::slug('Corta uñas'),
                'size' => true
            ],

            [
                'category_id' => 2,
                'name' => 'Peine',
                'slug' => Str::slug('Peine'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 2,
                'name' => 'Cepillo de dientes',
                'slug' => Str::slug('Cepillo de dientes'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 2,
                'name' => 'Dedales',
                'slug' => Str::slug('Dedales'),
            ],

            [
                'category_id' => 2,
                'name' => 'Almooaza',
                'slug' => Str::slug('Almooaza'),
            ],

            [
                'category_id' => 2,
                'name' => 'Cardas',
                'slug' => Str::slug('Cardas'),
            ],

            [
                'category_id' => 2,
                'name' => 'Shampoo',
                'slug' => Str::slug('Shampoo'),
            ],

            [
                'category_id' => 2,
                'name' => 'Locion',
                'slug' => Str::slug('Locion'),
            ],

            [
                'category_id' => 2,
                'name' => 'Sanitizante',
                'slug' => Str::slug('Sanitizante'),
            ],

            [
                'category_id' => 2,
                'name' => 'Espuma seco',
                'slug' => Str::slug('Espuma seco'),
            ],

            [
                'category_id' => 2,
                'name' => 'Antiseptico',
                'slug' => Str::slug('Antiseptico'),
            ],

            [
                'category_id' => 2,
                'name' => 'Eliminador de olores',
                'slug' => Str::slug('Eliminador de olores'),
            ],

            [
                'category_id' => 2,
                'name' => 'Toalla',
                'slug' => Str::slug('Toalla'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 2,
                'name' => 'Quita pelusa',
                'slug' => Str::slug('Quita pelusa'),
            ],

            [
                'category_id' => 2,
                'name' => 'Porta popos',
                'slug' => Str::slug('Porta popos'),
            ],

            [
                'category_id' => 2,
                'name' => 'Jabones',
                'slug' => Str::slug('Jabones'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 3,
                'name' => 'Peluche',
                'slug' => Str::slug('Peluche'),
                'size' => true
            ],

            [
                'category_id' => 3,
                'name' => 'Pelota',
                'slug' => Str::slug('Pelota'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 3,
                'name' => 'Balon',
                'slug' => Str::slug('Balon'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 3,
                'name' => 'Juguete a distancia',
                'slug' => Str::slug('Juguete a distancia'),
            ],

            [
                'category_id' => 3,
                'name' => 'Congelable',
                'slug' => Str::slug('Congelable'),
            ],

            [
                'category_id' => 3,
                'name' => 'Tapete',
                'slug' => Str::slug('Tapete'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 4,
                'name' => 'Carnaza',
                'slug' => Str::slug('Carnaza'),
                'size' => true
            ],

            [
                'category_id' => 4,
                'name' => 'Costales',
                'slug' => Str::slug('Costales'),
            ],

            [
                'category_id' => 4,
                'name' => 'Premios',
                'slug' => Str::slug('Premios'),
            ],

            [
                'category_id' => 5,
                'name' => 'Huesos',
                'slug' => Str::slug('Huesos'),
                'size' => true
            ],

            [
                'category_id' => 6,
                'name' => 'Jeringa alimentación',
                'slug' => Str::slug('Jeringa alimentación'),
            ],

            [
                'category_id' => 6,
                'name' => 'Kit medicina',
                'slug' => Str::slug('Kit medicina'),
            ],

            [
                'category_id' => 7,
                'name' => 'Platos',
                'slug' => Str::slug('Platos'),
            ],

            [
                'category_id' => 7,
                'name' => 'Kit medicina',
                'slug' => Str::slug('Kit medicina'),
            ],

            [
                'category_id' => 6,
                'name' => 'Kit medicina',
                'slug' => Str::slug('Kit medicina'),
            ],

            [
                'category_id' => 6,
                'name' => 'Kit medicina',
                'slug' => Str::slug('Kit medicina'),
            ],

        ];

        foreach ($subcategories as $subcategory) {


            Subcategory::factory(1)->create($subcategory);

        }
    }
}
