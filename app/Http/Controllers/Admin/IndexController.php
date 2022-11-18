<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index',[
            'title' => 'Админка'
        ]);
    }

    public function create(Request $request)
    {
        if($request->isMethod('post'))
        {

            //Подготовка массива данных
            $data = [
                'category_id' => (int)$request->category_id,
                'title' => $request->title,
                'desc' => $request->desc,
                'inform' => $request->inform,
                'date_of_public' => date('Y-m-d H:i:s'),
                'isPrivate' => $request->has('isPrivate')
            ];

            $id = DB::table('news')->insertGetId($data);

            $request->flash();

            $article = DB::table('news')
                ->join('categories', 'category_id', '=', 'categories.id')
                ->select('news.id', 'categories.slug')
                ->where('news.id', '=', $id)
                ->first();

            return redirect()
                ->route('admin.create')
                ->with('notice', [
                    'text' => 'Новость успешно добавлена! ',
                    'link' =>  route('news.show', [$article->slug, $article->id])
                ]);
        }

        $categories = DB::table('categories')->get();

        return view('admin.create_news', [
            'title' => 'Публикация новости',
            'categories' => $categories
        ]);
    }

    private function download($data, $filename): \Illuminate\Http\JsonResponse
    {
        return response()->json($data)
            ->header('Content-Disposition', 'attachment; filename = ' . $filename . ".txt")
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function downloadImage()
    {
        return response()->download('test.jpg');
    }

    /**
     * @throws FileNotFoundException
     */

    public function downloadArticles(Categories $categories, News $news, Request $request)
    {
        if ($request->isMethod('post')){
            $category_id = $request->input('category_id');
            $categoryName = $categories->getCategoryName(null, $category_id);
            $data = $news->getFilteredNews(null, $categories, $category_id);

           return $this->download($data, $categoryName);
        }

        return view('admin.downloadArticles', [
            'title' => 'Скачать новости',
            'categories' => $categories->getAllCategories()
        ]);
    }
}
