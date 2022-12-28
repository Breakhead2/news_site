<?php

namespace App\Http\Controllers;

use App\Models\News;

class HomeController extends Controller
{

    public function index()
    {
        $last_news= News::query()
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.type', 'categories.slug')
            ->orderByDesc('date_of_pub')
            ->limit(5)
            ->get();

        return view('index', [
            'title' => 'VOICE',
            'last_news' => $last_news,
            'add' => 'want_more'
        ]);
    }

}
