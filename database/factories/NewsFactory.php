<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    $inform = $faker->realText(rand(800, 5000));
    return [
        'category_id' => random_int(1, 11),
        'title' => $faker->realText(rand(30, 80)),
        'desc' => mb_substr($inform, 0, mb_strpos($inform, ' ', 250)) . '...',
        'inform' => $inform,
        'created_at' => $faker->date('Y-m-d h:m:s'),
        'isPrivate' => $faker->boolean()
    ];
});
