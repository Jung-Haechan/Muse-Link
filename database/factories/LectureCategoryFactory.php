<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LectureCategory;
use Faker\Generator as Faker;

$factory->define(LectureCategory::class, function (Faker $faker) {
    $is_free = $faker->boolean;
    $price = $is_free ? 0 : $faker->numberBetween(0, 100000);
    return [
        'title' => $faker->realText(20),
        'description' => $faker->realText(100),
        'thumbnail_img' => 'https://i.picsum.photos/id/'.rand(0, 1000).'/300/300.jpg',
        'price' => $price,
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
