<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\{Category, News};
use function view;

class NewsController extends Controller
{

    public function index()
   {
       $news = News::query()
           ->join('categories', 'category_id', '=', 'categories.id')
           ->select('news.*', 'categories.name', 'categories.slug')
           ->paginate(5);



       return view('news.index', [
           'title' => 'Новости',
           'categories' => Category::all(),
           'news' => $news
       ]);
   }

    public function category($slug)
    {
        $news = News::query()
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('news.*', 'categories.name', 'categories.slug')
            ->where('slug', '=', $slug)
            ->get();

        $category_name = Category::query()
            ->select('name')
            ->where('slug', '=', $slug)
            ->first();

        return view('news.index', [
            'title' => 'Новости ' . $category_name->name,
            'categories' => Category::all(),
            'news' => $news
        ]);
    }

    public function show($slug, News $news)
   {
       $article = News::query()
           ->join('categories', 'category_id', '=', 'categories.id')
           ->select('news.*', 'categories.name', 'categories.slug')
           ->where('news.id', '=', $news->id)
           ->first();

       return view('news.article', [
           'title' => $article->title,
           'article' => $article
       ]);
   }
}
