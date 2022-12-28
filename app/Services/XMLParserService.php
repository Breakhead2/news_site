<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use App\Models\Resource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($link)
    {
        $xml = XmlParser::load($link);

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => [
                'uses' => 'channel.item[title,description,pubDate,category,enclosure::url]'
            ]
        ]);

        //удаление старых (2 месяц назад) новостей из БД
        News::query()->where("date_of_pub", "<", now()->addDay(-2)->toDateTimeString())->delete();

        foreach ($data['news'] as $item){
            $resource = Resource::query()->where('name', '=', $data['title'])->first();

            $category = Category::firstOrCreate(
                ['type' => $item['category'] ?? $data['title']],
                [
                    'slug' => Str::slug($item['category'] ?? $data['title']),
                    'resource_id' => $resource->id
                ]
            );

            $desc = $this->deleteTags($item['description']);
            $title = $this->deleteTags($item['title']);

            News::firstOrCreate(
                ['title' => $title],
                [
                    'category_id'=> $category->id,
                    'desc' => Str::substr($desc, 0,  97) . '...',
                    'inform' => $desc,
                    'image_url' => $item['enclosure::url'],
                    'date_of_pub' => Carbon::parse($item['pubDate']),
                    'isPrivate' => rand(0,1),
                    'resource_id' => $resource->id
                ]);
        }
    }

    private function deleteTags($string){
        $text = trim(strip_tags($string));
        return str_replace(['&nbsp;', '&raquo;', '&laquo;'],' ', $text);
    }

}
