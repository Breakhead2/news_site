<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Category, News};
use Illuminate\Http\{Request, JsonResponse};
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class IndexController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('news.*', 'categories.name', 'categories.slug')
            ->orderByDesc('created_at')
            ->paginate(5);

        return view('admin.index',[
            'title' => 'Админка',
            'categories' => Category::all(),
            'news' => $news
        ]);
    }

    public function category($slug)
    {
        $news = News::query()
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('news.*', 'categories.name', 'categories.slug')
            ->where('slug', '=', $slug)
            ->orderByDesc('created_at')
            ->paginate(5);


        $category_name = Category::query()
            ->select('name')
            ->where('slug', '=', $slug)
            ->first();


        return view('admin.index', [
            'title' => 'Новости ' . $category_name->name,
            'categories' => Category::all(),
            'news' => $news
        ]);
    }

    private function download($data, $filename): JsonResponse
    {
        return response()
            ->json($data)
            ->header('Content-Disposition', 'attachment; filename = ' . $filename . ".txt")
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function downloadImage(): BinaryFileResponse
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
