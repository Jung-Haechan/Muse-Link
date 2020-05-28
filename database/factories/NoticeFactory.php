<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Notice;
use Faker\Generator as Faker;

$factory->define(Notice::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(30),
        'content' => $faker->realText(200),
        'views' => $faker->numberBetween(0, 1000),
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
