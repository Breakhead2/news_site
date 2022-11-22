<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'name' => 'Политика',
                'slug' => 'politics'
            ],
            [
                'name' => 'В мире',
                'slug' => 'world'
            ],
            [
                'name' => 'Экономика',
                'slug' => 'economy'
            ],
            [
                'name' => 'Общество',
                'slug' => 'society'
            ],
            [
                'name' => 'Происшествия',
                'slug' => 'accident'
            ],
            [
                'name' => 'Армия',
                'slug' => 'army'
            ],
            [
                'name' => 'Наука',
                'slug' => 'science'
            ],
            [
                'name' => 'Спорт',
                'slug' => 'sport'
            ],
            [
                'name' => 'Культура',
                'slug' => 'culture'
            ],
            [
                'name' => 'Религия',
                'slug' => 'religion'
            ],
            [
                'name' => 'Туризм',
                'slug' => 'tourism'
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
