<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use function view;

class NewsController extends Controller
{
    /**
     * @throws FileNotFoundException
     */
    public function index(Categories $categories, News $news, $slug = null)
   {

       if(is_null($slug)){
           $news = $news->getAllNews();
       }else{
           $news = $news->getFilteredNews($slug, $categories);

           if(empty($news)) return view('404', ['title' => 'Страница не найдена']);
       }

       return view('news.index', [
           'title' => 'Новости ' . $categories->getCategoryName($slug),
           'categories' => $categories->getAllCategories(),
           'news' => $news
       ]);
   }

    /**
     * @throws FileNotFoundException
     */

    public function show($slug, $id, News $news, Categories $categories)
   {
       $article = $news->getOneNews($id);

       if(is_null($article)) return view('404', ['title' => 'Страница не найдена']);

       return view('news.article', [
           'title' => $article['title'],
           'article' => $article,
           'categories' => $categories->getAllCategories()
       ]);
   }
}
