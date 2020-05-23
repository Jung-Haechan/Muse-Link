<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use App\User;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    $user = User::all()->random();
    return [
        'title' => $faker->realText(20),
        'description' => $faker->realText(),
        'user_id' => $user->id,
        'cover_img_file' => 'https://i.picsum.photos/id/'.rand(0, 1000).'/300/300.jpg',
        'has_composer' => $faker->boolean,
        'has_editor' => $faker->boolean,
        'has_lyricist' => $faker->boolean,
        'has_singer' => $faker->boolean,
        'is_completed' => $faker->numberBetween(1, 10) > 8,
        'genre' => $faker->realText(10),
        'is_opened' => $faker->numberBetween(0, 4),
        'views' => $faker->numberBetween(0, 1000),
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
