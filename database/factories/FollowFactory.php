<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Follow;
use App\User;
use Faker\Generator as Faker;

$factory->define(Follow::class, function (Faker $faker) {
    $user_id = User::all()->random()->id;
    $followee_id = User::all()->random()->id;
    while ($user_id === $followee_id) $followee_id = User::all()->random()->id;
    return [
        'user_id' => $user_id,
        'followee_id' => $followee_id,
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
