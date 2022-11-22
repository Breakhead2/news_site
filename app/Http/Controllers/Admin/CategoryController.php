<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function createCategory(Request $request, Category $category)
    {
        if($request->isMethod('post'))
        {
            $category->fill($request->all());
            $category->save();

            return redirect()->route('admin.createCategory')->with('notice', [
                'text' => 'Категория успешно добавлена'
            ]);
        }

        return view('admin.createCategory', ['title' => 'Создать категорию']);
    }

    public function editCategory(Category $category)
    {
        return view('admin.createCategory', [
            'title' => 'Редактировать категорию',
            'category' => $category
        ]);
    }

    public function updateCategory(Request $request, Category $category): \Illuminate\Http\RedirectResponse
    {
        $category->fill($request->all());
        $category->save();

        return redirect()->route('admin.index')
            ->with('notice', ['text' => 'Категория успешно обновлена!']);
    }

    /**
     * @throws \Exception
     */

    public function destroyCategory(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.index')->with('notice', ['text' => 'Категория успешно удалена']);
    }
}
