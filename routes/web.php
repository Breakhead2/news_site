<?php

use App\Http\Controllers\{AboutController,
    HomeController,
    ProfileController};
use App\Http\Controllers\Admin\{NewsController, ResourceController, CategoryController, DownloadController, ParserController, UsersController};

use App\Http\Controllers\Auth\SocialiteController;
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
        Route::get('/parser', [ParserController::class, 'index'])->name('parser');

        //crud news
        Route::resource('news', NewsController::class)->except(['destroy']);
        //crud category
        Route::resource('category', CategoryController::class)->except(['show', 'index']);
        //users
        Route::get('/users', [UsersController::class, 'index'])->name('users');
        //resources
        Route::resource('resource', ResourceController::class)->except(['show']);

    });

//Авторизация
Auth::routes();
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider'])->middleware('guest')->name('loginGithub');
Route::get('/auth/{provider}/response', [SocialiteController::class, 'handleProviderCallback'])->middleware('guest');

//ajax
Route::get('/api/users', [UsersController::class, 'switchRole'])->middleware(['auth', 'is_admin']);
Route::get('/api/news/delete', [NewsController::class, 'delete'])->middleware(['auth', 'is_admin']);
