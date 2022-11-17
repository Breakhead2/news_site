<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\DB;
use function view;

class NewsController extends Controller
{

    public function index($slug = null)
   {
       if(is_null($slug)){
           $news = DB::table('news')
               ->join('categories', 'category_id', '=', 'categories.id')
               ->select('news.*', 'categories.*')
               ->get();
       }else{
           $news = DB::table('news')
               ->join('categories', 'category_id', '=', 'categories.id')
               ->select('news.*', 'categories.*')
               ->where('slug', '=', $slug)
               ->get();

           if(is_null($news)) return view('404', ['title' => 'Страница не найдена']);
       }

       $categories = DB::table('categories')->get();
       $category_name = DB::table('categories')->select('name')->where('slug', '=', $slug)-> first();

       return view('news.index', [
           'title' => 'Новости ' . ($category_name->name ?? ''),
           'categories' => $categories,
           'news' => $news
       ]);
   }

    public function show($slug, $id)
   {
       $article = DB::table('news')
           ->join('categories', 'category_id', '=', 'categories.id')
           ->select('news.*', 'categories.*')
           ->get($id);

       if(is_null($article)) return view('404', ['title' => 'Страница не найдена']);

       return view('news.article', [
           'title' => $article['title'],
           'article' => $article
       ]);
   }
}
