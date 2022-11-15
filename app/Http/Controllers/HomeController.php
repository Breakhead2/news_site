<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(News $news, Categories $categories)
    {
        return view('index', [
            'title' => 'VOICE',
            'last_news' => array_slice($news->getAllNews(), 0, 3),
            'categories' => $categories->getAllCategories(),
            'add' => 'want_more'
        ]);
    }

    public function save(News $news)
    {
        Storage::disk('local')->put('news.json', json_encode($news->getAllNews(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
}
