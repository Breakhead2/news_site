<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\{Category, News};
use function view;

class IndexController extends Controller
{

    public function index()
   {
       $news = News::query()
           ->join('categories', 'category_id', '=', 'categories.id')
           ->select('news.*', 'categories.type', 'categories.slug')
           ->orderByDesc('created_at')
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
            ->select('news.*', 'categories.type', 'categories.slug')
            ->where('slug', '=', $slug)
            ->orderByDesc('created_at')
            ->paginate(5);


        $category_name = Category::query()
            ->select('type')
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
           ->select('news.*', 'categories.type', 'categories.slug')
           ->where('news.id', '=', $news->id)
           ->first();

       return view('news.article', [
           'title' => $article->title,
           'article' => $article
       ]);
   }
}
