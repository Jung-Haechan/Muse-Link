<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lecture;
use App\Models\LectureCategory;
use Faker\Generator as Faker;

$factory->define(Lecture::class, function (Faker $faker) {
    $lecture_category = LectureCategory::all()->random();
    return [
        'category_id' => $lecture_category->id,
        'title' => $faker->realText(20),
        'video_file' => 'public/video/UWa3bxDxQ7pGwtKA8iEFggN3McOUxYTy44DU5nBt.mp4',
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
