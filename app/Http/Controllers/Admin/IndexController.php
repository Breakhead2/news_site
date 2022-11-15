<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index():string
    {
        return view('admin.index',[
            'title' => 'Админка'
        ]);
    }

    public function create(Request $request, Categories $categories, News $news)
    {
        if($request->isMethod('post'))
        {
            //TODO добавить новость в хранилище, прочитать старые новости, добавить новость в конец и сохранить файл, в конце редирект на новую новость.

            $date = $request->except('_token');
            $date['date_of_public'] = date('Y-m-d H:i:s');

            if(array_key_exists('private', $date)){
                $date['private'] = true;
            }else{
                $date['private'] = false;
            }

            $news_keys = array_keys($news->getAllNews());
            $last_key = array_pop($news_keys);

            $date['id'] = $last_key + 1;
//
            //$request->flash();
            //return redirect()->route('news.show', [$categories[$date['category']]['slug'], $news[$last_key+1]['id']]);
        }

        return view('admin.create_news', [
            'title' => 'Публикация новости',
            'categories' => $categories->getAllCategories()
        ]);
    }

    public function downloadImage()
    {
        return response()->download('test.jpg');
    }

    public function downloadText(News $news)
    {
        return response()->json($news->getAllNews())
            ->header('Content-Disposition', 'attachment; filename = "news.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
