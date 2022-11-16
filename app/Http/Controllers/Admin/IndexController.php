<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index',[
            'title' => 'Админка'
        ]);
    }

    /**
     * @throws FileNotFoundException
     */

    public function create(Request $request, Categories $categories, News $news, HomeController $homeController)
    {
        if($request->isMethod('post'))
        {
            $categories = $categories->getAllCategories();
            $news = $news->getAllNews();

            //Подготовка массива данных
            $data = [
                'category_id' => (int)$request->category_id,
                'title' => $request->title,
                'desc' => $request->desc,
                'inform' => $request->inform,
                'date_of_public' => date('Y-m-d H:i:s'),
                'isPrivate' => $request->has('isPrivate')
            ];

            $news[] = $data;

            $id = array_key_last($news);
            $news[$id]['id'] = $id;

            $homeController->save($news, 'news');

            return redirect()->route('news.show', [$categories[$data['category_id']]['slug'], array_key_last($news)]);
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

    /**
     * @throws FileNotFoundException
     */

    public function downloadArticles(Categories $categories, News $news, Request $request, HomeController $homeController)
    {
        if ($request->isMethod('post')){
            $category_id = $request->input('category_id');
            $categoryName = $categories->getCategoryName(null, $category_id);
            $data = $news->getFilteredNews(null, $categories, $category_id);

           return $homeController->download($data, $categoryName);
        }

        return view('admin.downloadArticles', [
            'title' => 'Скачать новости',
            'categories' => $categories->getAllCategories()
        ]);
    }
}
