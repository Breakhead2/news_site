<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class Categories
{
    private array $categories = [
        '1' => [
            'id' => 1,
            'name' => 'Политика',
            'slug' => 'politics'
            ],
        '2' => [
            'id' => 2,
            'name' => 'В мире',
            'slug' => 'world'
            ],
        '3' => [
            'id' => 3,
            'name' => 'Экономика',
            'slug' => 'economy'
            ],
        '4' => [
            'id' => 4,
            'name' => 'Общество',
            'slug' => 'society'
            ],
        '5' => [
            'id' => 5,
            'name' => 'Происшествия',
            'slug' => 'accident'
            ],
        '6' => [
            'id' => 6,
            'name' => 'Армия',
            'slug' => 'army'
            ],
        '7' =>[
            'id' => 7,
            'name' => 'Наука',
            'slug' => 'science'
            ],
        '8' => [
            'id' => 8,
            'name' => 'Спорт',
            'slug' => 'sport'
            ],
        '9' => [
            'id' => 9,
            'name' => 'Культура',
            'slug' => 'culture'
            ],
        '10' => [
            'id' => 10,
            'name' => 'Религия',
            'slug' => 'religion'
            ],
        '11' => [
            'id' => 11,
            'name' => 'Туризм',
            'slug' => 'tourism'
            ]
    ];

    /**
     * @throws FileNotFoundException
     */
    public function getAllCategories():array
    {
        return json_decode(Storage::disk('local')->get('categories.json'), true);
    }

    /**
     * @throws FileNotFoundException
     */

    public function getCategoryId($slug):?int
    {
       foreach ($this->getAllCategories() as $category) {
           if($category['slug'] ==  $slug) return $category['id'];
       }
       return null;
    }

    /**
     * @throws FileNotFoundException
     */

    public function getCategoryName($slug, $id = null):?string
    {
        if(!is_null($id)) return $this->getAllCategories()[$id]['name'];

        foreach ($this->getAllCategories() as $category) {
            if($category['slug'] ==  $slug) return $category['name'];
        }

        return null;
    }
}
