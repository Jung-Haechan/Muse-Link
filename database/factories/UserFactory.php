<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Models Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(User::class, function (Faker $faker) {

    $created_at = $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul');

    return [
        'email' => $faker->unique()->safeEmail,
        'resource_server' => 'google',
        'name' => $faker->name,
        'profile_img' => 'https://via.placeholder.com/150',
        'gender' => $faker->randomElement(['male', 'female']),
        'remember_token' => Str::random(10),
        'introduce' => $faker->realText(100),
        'is_composer' => $faker->boolean,
        'is_editor' => $faker->boolean,
        'is_lyricist' => $faker->boolean,
        'is_singer' => $faker->boolean,
        'producer_updated_at' => $created_at,
        'singer_updated_at' => $created_at,
        'created_at' => $created_at,
        'updated_at' => now('asia/Seoul'),
    ];
});
