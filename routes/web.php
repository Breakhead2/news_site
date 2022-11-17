<?php

use App\Http\Controllers\{AboutController,
    Admin\IndexController,
    Auth\LoginController,
    Auth\RegisterController,
    HomeController,
    News\NewsController};
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
        Route::get('/{slug}', [NewsController::class, 'index'])->name('category');
        Route::get('/{slug}/{id}', [NewsController::class, 'show'])->name('show');
    });

//Админка
Route::name('admin.')
    ->prefix('admin')
    ->group(function (){
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::match(['get', 'post'], '/create', [IndexController::class, 'create'])->name('create');
        Route::get('/download_image', [IndexController::class, 'downloadImage'])->name('downloadImage');
        Route::match(['get', 'post'],'/download_articles', [IndexController::class, 'downloadArticles'])->name('downloadArticles');
    });
