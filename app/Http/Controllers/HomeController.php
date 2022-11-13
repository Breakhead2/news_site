<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

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
            'last_news' => $news->getAllNews(),
            'categories' => $categories->getAllCategories(),
            'add' => 'want_more'
        ]);
    }
}
