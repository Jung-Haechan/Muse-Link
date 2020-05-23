<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Collaborator;
use App\Models\Project;
use App\User;
use Faker\Generator as Faker;

$factory->define(Collaborator::class, function (Faker $faker) {
    $user = User::all()->random();
    $project = Project::all()->random();
    return [
        'user_id' => $user->id,
        'project_id' => $project->id,
        'role' => $faker->randomElement(['composer', 'editor', 'lyricist', 'singer', 'master']),
        'is_approved' => $faker->numberBetween(0, 3),
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
