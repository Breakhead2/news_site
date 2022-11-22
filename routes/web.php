<?php

use App\Http\Controllers\{AboutController,
    Auth\LoginController,
    Auth\RegisterController,
    HomeController};

use App\Http\Controllers\News\{NewsController};

use App\Http\Controllers\Admin\{CategoryController, IndexController, NewsController as AdminNewsController};

use Illuminate\Support\Facades\Route;


//Основные страницы сайта
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [RegisterController::class, 'register'])->name('register');

//Новости
Route::name('news.')
    ->prefix('news')
    ->group(function (){
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/{slug}', [NewsController::class, 'category'])->name('category');
        Route::get('/{slug}/{news}', [NewsController::class, 'show'])->name('show');
    });

//Админка
Route::name('admin.')
    ->prefix('admin')
    ->group(function (){
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/{slug}', [IndexController::class, 'category'])->name('category');

        //CRUD BLOCK NEWS
        Route::match(['get', 'post'], '/news/create', [AdminNewsController::class, 'create'])->name('create');
        Route::get('/news/edit/{news}', [AdminNewsController::class, 'edit'])->name('edit');
        Route::post('/news/update/{news}', [AdminNewsController::class, 'update'])->name('update');
        Route::delete('/news/destroy/{news}', [AdminNewsController::class, 'destroy'])->name('destroy');

        //CRUD BLOCK CATEGORY
        Route::match(['get', 'post'], '/category/create', [CategoryController::class, 'createCategory'])->name('createCategory');
        Route::get('/category/edit/{category}', [CategoryController::class, 'editCategory'])->name('editCategory');
        Route::post('/category/update/{category}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::delete('/category/destroy/{category}', [CategoryController::class, 'destroyCategory'])->name('destroyCategory');

        Route::get('/download_image', [IndexController::class, 'downloadImage'])->name('downloadImage');
        Route::match(['get', 'post'],'/download_articles', [IndexController::class, 'downloadArticles'])->name('downloadArticles');
    });
