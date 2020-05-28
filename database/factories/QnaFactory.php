<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Qna;
use App\User;
use Faker\Generator as Faker;

$factory->define(Qna::class, function (Faker $faker) {
    $user = User::all()->random();
    return [
        'user_id' => $user->id,
        'question' => $faker->realText(30),
        'answer' => $faker->realText(200),
        'answered_at' => $faker->dateTimeBetween('-1 months', 'now', 'asia/Seoul'),
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
