<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use App\User;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    $user = User::all()->random();
    $is_completed = $faker->numberBetween(1, 10) > 8;
    $created_at = $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul');

    if ($is_completed) {
        $completed_at = $faker->dateTimeBetween('-1 months', 'now', 'asia/Seoul');
        $is_opened = 0;
    } else {
        $completed_at = NULL;
        $is_opened = $faker->numberBetween(0, 4);
    }
    return [
        'title' => $faker->realText(20),
        'description' => $faker->realText(),
        'user_id' => $user->id,
        'cover_img_file' => 'https://via.placeholder.com/150',
        'has_composer' => $faker->boolean,
        'has_editor' => $faker->boolean,
        'has_lyricist' => $faker->boolean,
        'has_singer' => $faker->boolean,
        'completed_at' => $completed_at,
        'genre' => $faker->realText(10),
        'is_opened' => $is_opened,
        'views' => $faker->numberBetween(0, 1000),
        'last_updated_at' => $created_at,
        'created_at' => $created_at,
        'updated_at' => now('asia/Seoul'),
    ];
});
