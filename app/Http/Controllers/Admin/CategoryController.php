<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.create_category', ['title' => 'Создать категорию']);
    }

    /**
     * @throws ValidationException
     */

    public function store(Request $request, Category $category): \Illuminate\Http\RedirectResponse
    {

        $this->validate($request, Category::rules());
        $data = $request->all();

        //Создание слага
        $data['slug'] = Str::slug($request->name);

        $category->fill($data);
        $category->save();

        return redirect()
            ->route('admin.category.create')
            ->with('notice', [
            'status' => 'success',
            'text' => 'Категория успешно добавлена'
        ]);
    }

    public function edit(Category $category)
    {
        return view('admin.create_category', [
            'title' => 'Редактировать категорию',
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, Category::rules());

        $category->fill($request->all());
        $category->save();

        return redirect()
            ->route('admin.news.index')
            ->with('notice', [
                'status' => 'success',
                'text' => 'Категория успешно обновлена!'
            ]);
    }

    public function destroy(Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->delete();

        return redirect()->route('admin.news.index')->with('notice', [
            'status' => 'success',
            'text' => 'Категория успешно удалена'
        ]);
    }
}
