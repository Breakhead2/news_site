<?php

namespace App\Http\Controllers;

use App\Models\News;

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

    public function index()
    {
        $last_news= News::query()
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.name', 'categories.slug')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('index', [
            'title' => 'VOICE',
            'last_news' => $last_news,
            'add' => 'want_more'
        ]);
    }

}
