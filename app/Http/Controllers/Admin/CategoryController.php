<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.create_category', [
            'title' => 'Создать категорию',
            'resources' => Resource::all()
        ]);
    }

    /**
     * @throws ValidationException
     */

    public function store(Request $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, $this->validateRules());
        $data = $request->all();

        //Создание слага
        $data['slug'] = Str::slug($request->type);

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
            'category' => $category,
            'resources' => Resource::all()
        ]);
    }

    public function update(Request $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, $this->validateRules());

        $category->fill($request->all());
        $category->save();

        return redirect()
            ->route('admin.news.index')
            ->with('notice', [
                'status' => 'success',
                'text' => 'Категория успешно обновлена!'
            ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.news.index')
            ->with('notice', [
                'status' => 'success',
                'text' => 'Категория успешно удалена!'
            ]);
    }

    private static function validateRules():array
    {
        return ['type' => 'required|max:30|min:4|unique:categories,type'];
    }

}
