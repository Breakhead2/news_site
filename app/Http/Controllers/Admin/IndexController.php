<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Category, News};
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
                'category_id' => $request->category_id,
                'title' => $request->title,
                'desc' => $request->desc,
                'inform' => $request->inform,
                'date_of_public' => date('Y-m-d H:i:s'),
                'isPrivate' => $request->has('isPrivate')
            ];

            $id = DB::table('news')->insertGetId($data);

//            $request->flash();

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

        return view('admin.create_news', [
            'title' => 'Публикация новости',
            'categories' => Category::all()
        ]);
    }

    private function download($data, $filename): \Illuminate\Http\JsonResponse
    {
        return response()
            ->json($data)
            ->header('Content-Disposition', 'attachment; filename = ' . $filename . ".txt")
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function downloadImage(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return response()->download('test.jpg');
    }

    public function downloadArticles(Request $request)
    {
        if ($request->isMethod('post')){
            $category_id = $request->input('category_id');

            $categoryName = Category::query()
                ->select('name')
                ->where('categories.id', '=', $category_id)
                ->first();

            $data = News::query()
                ->join('categories', 'category_id', '=', 'categories.id')
                ->select('news.*')
                ->where('categories.id', '=', $category_id)
                ->get();

           return $this->download($data, $categoryName->name);
        }

        return view('admin.downloadArticles', [
            'title' => 'Скачать новости',
            'categories' => Category::all()
        ]);
    }
}
