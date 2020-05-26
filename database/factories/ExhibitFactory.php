<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Exhibit;
use App\User;
use Faker\Generator as Faker;

$factory->define(Exhibit::class, function (Faker $faker) {
    $user = User::all()->random();
    $is_file = $faker->boolean;
    if ($is_file) {
        $audio_file = 'public/audio/project/UWa3bxDxQ7pGwtKA8iEFggN3McOUxYTy44DU5nBt.mpga';
        $youtube_url = NULL;
    } else {
        $audio_file = NULL;
        $youtube_url = 'https://www.youtube.com/watch?v='.$faker->text(10);
    }

    return [
        'title' => $faker->realText(20),
        'description' => $faker->realText(),
        'user_id' => $user->id,
        'audio_file' => $audio_file,
        'youtube_url' => $youtube_url,
        'cover_img_file' => 'https://i.picsum.photos/id/'.rand(0, 1000).'/300/300.jpg',
        'lyrics' => $faker->realText(),
        'role' => $faker->randomElement(['composer', 'editor', 'lyricist', 'singer']),
        'is_opened' => $faker->numberBetween(0, 3),
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
