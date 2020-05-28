<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $user = User::all()->random();
    return [
        'user_id' => $user->id,
        'title' => $faker->realText(80),
        'content' => $faker->realText(200),
        'views' => $faker->numberBetween(0, 1000),
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
