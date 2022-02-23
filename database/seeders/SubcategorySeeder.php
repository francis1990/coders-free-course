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

        $categories = [
            [
                'category_id' => 1,
                'name' => 'Celulares y smartphones',
                'slug' => Str::slug('Celulares y smartphones'),
                'color' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Accesorios para celulares',
                'slug' => Str::slug('Accesorios para celulares'),
            ],
            [
                'category_id' => 1,
                'name' => 'Smartwatches',
                'slug' => Str::slug('Smartwatches'),
            ],
            [
                'category_id' => 2,
                'name' => 'TV y audio',
                'slug' => Str::slug('TV y audio'),
            ],
            [
                'category_id' => 2,
                'name' => 'Audios',
                'slug' => Str::slug('Audios'),
            ],
            [
                'category_id' => 2,
                'name' => 'Audios para autos',
                'slug' => Str::slug('Audios para autos'),
            ],
            [
                'category_id' => 3,
                'name' => 'Xbos',
                'slug' => Str::slug('Xbos'),
            ],
            [
                'category_id' => 3,
                'name' => 'Play station',
                'slug' => Str::slug('Play station'),
            ],
            [
                'category_id' => 3,
                'name' => 'Videos para pc',
                'slug' => Str::slug('Videos para pc'),
            ],
            [
                'category_id' => 3,
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo'),
            ],
            [
                'category_id' => 4,
                'name' => 'Portatiles',
                'slug' => Str::slug('Portatiles'),
            ],
            [
                'category_id' => 4,
                'name' => 'PC escritorio',
                'slug' => Str::slug('PC escritorio'),
            ],
            [
                'category_id' => 4,
                'name' => 'Almacenamiento',
                'slug' => Str::slug('Almacenamiento'),
            ],
            [
                'category_id' => 4,
                'name' => 'Accesorios computadoras',
                'slug' => Str::slug('Accesorios computadoras'),
            ],
            [
                'category_id' => 5,
                'name' => 'Mujeres',
                'slug' => Str::slug('Mujeres'),
                'color' => true,
                'size' => true,
            ],
            [
                'category_id' => 5,
                'name' => 'Hombres',
                'slug' => Str::slug('Hombres'),
                'color' => true,
                'size' => true,
            ],
            [
                'category_id' => 5,
                'name' => 'Lentes',
                'slug' => Str::slug('Lentes'),
            ],
            [
                'category_id' => 5,
                'name' => 'Relojes',
                'slug' => Str::slug('Relojes'),
            ],
        ];

        foreach ($categories as $category) {
            Subcategory::factory(1)->create($category);
        }
    }
}
