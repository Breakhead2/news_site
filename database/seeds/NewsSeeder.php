<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }


    private function getData():array
    {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');

        for($i = 0, $category_id = 1; $category_id < 12; $i++){
            if($i <= 10) {
                $inform = $faker->realText(rand(800, 5000));
                $data[] = [
                    'category_id' => $category_id,
                    'title' => $faker->realText(rand(30, 80)),
                    'desc' => mb_substr($inform, 0, mb_strpos($inform, ' ', 250)) . '...',
                    'inform' => $inform,
                    'created_at' => $faker->date('Y-m-d h:m:s'),
                    'isPrivate' => $faker->boolean()
                ];
            }else{
                $category_id++;
                $i = 0;
            }
        }

        return $data;
    }
}
