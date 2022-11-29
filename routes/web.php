<?php

use App\Http\Controllers\{AboutController, HomeController, ProfileController};
use App\Http\Controllers\Admin\{CategoryController, DownloadController, NewsController, UsersController};
use App\Http\Controllers\News\IndexController;
use Illuminate\Support\Facades\{Auth, Route};



//Основные страницы сайта
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::match(['get', 'post'], '/profile', [ProfileController::class, 'update'])->middleware('auth')->name('profile');

//Новости
Route::name('news.')
    ->prefix('news')
    ->group(function (){
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::get('/{slug}', [IndexController::class, 'category'])->name('category');
        Route::get('/{slug}/{news}', [IndexController::class, 'show'])->name('show');
    });

//Админка
Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function (){
        Route::get('/download_image', [DownloadController::class, 'downloadImage'])->name('downloadImage');
        Route::match(['get', 'post'],'/download_articles', [DownloadController::class, 'downloadArticles'])->name('downloadArticles');

        //crud news
        Route::resource('news', NewsController::class);
        //crud category
        Route::resource('category', CategoryController::class)->except(['show', 'index']);
        //users
        Route::match(['get', 'post'], '/users', [UsersController::class, 'index'])->name('users');
    });

//Авторизация
Auth::routes();
