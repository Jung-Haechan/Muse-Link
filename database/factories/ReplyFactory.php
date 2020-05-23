<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lecture;
use App\Models\Like;
use App\Models\Post;
use App\Models\Project;
use App\Models\Reply;
use App\User;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    $user = User::all()->random();
    $category = $faker->randomElement(['project', 'post', 'lecture']);
    $project_id = NULL;
    $post_id = NULL;
    $lecture_id = NULL;

    if ($category === 'project') {
        $project_id = Project::all()->random()->id;
    } elseif ($category === 'post') {
        $post_id = Post::all()->random()->id;
    } else {
        $lecture_id = Lecture::all()->random()->id;
    }

    return [
        'user_id' => $user->id,
        'project_id' => $project_id,
        'post_id' => $post_id,
        'lecture_id' => $lecture_id,
        'content' => $faker->realText(80),
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
