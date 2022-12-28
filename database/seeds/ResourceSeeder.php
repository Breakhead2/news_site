<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resources = [
          [
              'name' => 'LIfe-News.Ru - Портал жизненных новостей',
              'rss_url' => 'https://life-news.ru/rss.xml'
          ],
          [
              'name' => 'Взгляд',
              'rss_url' => 'https://vz.ru/rss.xml'
          ],
          [
              'name' => 'Lenta.ru : Новости',
              'rss_url' => 'https://lenta.ru/rss'
          ],
          [
              'name' => 'В мире — Рамблер/новости',
              'rss_url' => 'https://news.rambler.ru/rss/world/'
          ],
          [
              'name' => 'Российская газета',
              'rss_url' => 'https://rg.ru/xml/index.xml'
          ]
        ];

        DB::table('resources')->insert($resources);
    }
}
