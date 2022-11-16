<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class Categories
{
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
