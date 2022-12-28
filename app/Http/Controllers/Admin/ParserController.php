<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\NewsParsing;
use App\Models\Category;
use App\Models\Resource;
use App\Services\XMLParserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ParserController extends Controller
{
    public function index(XMLParserService $parserService)
    {
        $sources = Resource::all();

        foreach ($sources as $source){
            $parserService->saveNews($source->rss_url);
            //NewsParsing::dispatch($source->rss_url);
        }
        //небольшая задержка перед редиректом,чтобы успели добавиться новости
//        $count = Category::query()->count('id');
//        while ($count < 10){
//            $count = Category::query()->count('id');
//        }

        return redirect()->route('admin.news.index');
    }

}
