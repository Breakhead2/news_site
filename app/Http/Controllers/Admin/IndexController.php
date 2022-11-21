<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Category, News};
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        //TODO переписать вьюху
        return view('admin.index',[
            'title' => 'Админка'
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
