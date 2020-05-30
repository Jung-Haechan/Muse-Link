<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Message;
use App\User;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    $sender_id = User::all()->random()->id;
    $receiver_id = User::all()->random()->id;
    while ($sender_id === $receiver_id) $receiver_id = User::all()->random()->id;
    return [
        'sender_id' => $sender_id,
        'receiver_id' => $receiver_id,
        'content' => $faker->sentence,
        'is_read' => true,
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
