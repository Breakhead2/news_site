<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNews;
use App\Models\{Category, News};
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\{RedirectResponse, Request};


class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('news.*', 'categories.name', 'categories.slug')
            ->orderByDesc('news.created_at')
            ->paginate(5);

        return view('admin.index',[
            'title' => 'Админка',
            'categories' => Category::all(),
            'news' => $news
        ]);
    }

    public function show($slug)
    {
        $news = News::query()
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('news.*', 'categories.name', 'categories.slug')
            ->where('slug', '=', $slug)
            ->orderByDesc('news.created_at')
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

    public function create()
    {
        return view('admin.create_news', [
            'title' => 'Публикация новости',
            'categories' => Category::all()
            ]);
    }

    public function store(Request $request, News $news)
    {
        $this->validateAndStore($request, $news);

        $category = Category::query()
            ->select('slug')
            ->find($news->category_id);

        return redirect()
            ->route('admin.news.create')
            ->with('notice', [
                'status' => 'success',
                'text' => 'Новость успешно добавлена! ',
                'link' =>  route('news.show', [$category->slug, $news])
            ]);
    }

    public function edit(News $news)
    {
        return view('admin.create_news', [
            'title' => 'Редактирование',
            'news' => $news,
            'categories' => Category::all()
            ]);
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $this->validateAndStore($request, $news);

        $category = Category::query()
            ->select('slug')
            ->find($news->category_id);


        return redirect()
            ->route('admin.news.index')
            ->with('notice', [
                'status' => 'success',
                'text' => 'Новость успешно обновлена! ',
                'link' =>  route('news.show', [$category->slug, $news])
            ]);
    }

    public function destroy(News $news): RedirectResponse
    {
        Storage::disk('local')->deleteDirectory('public/images/articles/' . $news->id);
        $news->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('notice', [
                'status' => 'success',
                'text' => 'Новость успешно удалена!'
            ]);
    }

    private function ValidateRules():array
    {
        return [
            'title' => 'required|min:15|max:80',
            'desc' => 'required|min:30|max:100',
            'inform' => 'required|min:30|max:5000',
            'isPrivate' => 'sometimes|in:1',
            'image' => 'mimes:jpeg,bmp,png,jpg|max:2048',
        ];
    }

    private function validateAndStore(Request $request, News $news){
        $this->validate($request, $this->ValidateRules());

        $news->fill($request->all());

        if($request->file('image')){
            $news->setAttribute('image', $request->file('image')->getClientOriginalName());
        }

        $news->save();

        if($request->file('image')){
            $request->file('image')->storeAs('public/images/articles/' . $news->id, $news->image);
        }
    }
}

