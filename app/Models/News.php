<?php

namespace App\Models;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class News
{
       /**
     * @throws FileNotFoundException
     */

    public function getAllNews():array
    {
        return json_decode(Storage::disk('local')->get('news.json'), true);
    }

    /**
     * @throws FileNotFoundException
     */

    public function getOneNews($id): ?array
    {
        if(array_key_exists($id, $this->getAllNews())){
            return $this->getAllNews()[$id];
        }
        return null;
    }

    public function getFilteredNews($slug, Categories $categories, $category_id = null):array
    {
        if(!is_null($slug)){
            $category_id = $categories->getCategoryId($slug);
        }

        $news = [];

        if(is_null($category_id)) return [];

        foreach ($this->getAllNews() as $article)
        {
            if($article['category_id'] == $category_id){
                $news[] = $article;
            }
        }
        return $news;
    }
}
