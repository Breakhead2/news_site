<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function create(Request $request, News $news)
    {
        if($request->isMethod('post'))
        {
//            $request->flash();

            $news->fill($request->all());
            $news->save();

            $category = Category::query()
                ->select('slug')
                ->find($news->category_id);

            return redirect()
                ->route('admin.create')
                ->with('notice', [
                    'text' => 'Новость успешно добавлена! ',
                    'link' =>  route('news.show', [$category->slug, $news])
                ]);
        }

        return view('admin.create_news', [
            'title' => 'Публикация новости',
            'categories' => Category::all()
        ]);
    }

    public function edit()
    {
        
    }
}
