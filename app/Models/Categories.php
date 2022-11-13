<?php

namespace App\Models;

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

    public function getAllCategories():array
    {
        return $this->categories;
    }

    public function getCategoryId($slug):?int
    {
       if (array_key_exists($slug, $this->getAllCategories())){
           return $this->getAllCategories()[$slug]['id'];
       }
       return null;
    }

    public function getCategoryName($slug):?string
    {
        if (array_key_exists($slug, $this->getAllCategories())){
            return $this->getAllCategories()[$slug]['name'];
        }
        return null;
    }
}
