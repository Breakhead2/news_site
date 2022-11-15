<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
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
     * @throws FileNotFoundException
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

    public function save($data, $filename)
    {
        Storage::disk('local')->put($filename . '.json', json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    public function download($data, $filename): \Illuminate\Http\JsonResponse
    {
        return response()->json($data)
            ->header('Content-Disposition', 'attachment; filename = ' . $filename . ".txt")
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
