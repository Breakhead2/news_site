<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;

class IndexController extends Controller
{
    public function index():string
    {
        return view('admin.index',[
            'title' => 'Админка',
            'userName' => 'Admin'
        ]);
    }

    public function create(Categories $categories)
    {
        return view('admin.create_news', [
            'title' => 'Публикация новости',
            'categories' => $categories->getAllCategories()
        ]);
    }
}
