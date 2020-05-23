<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LectureCategory;
use App\Models\Like;
use App\Models\Post;
use App\Models\Project;
use App\User;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    $user = User::all()->random();
    $category = $faker->randomElement(['project', 'post', 'lecture_category']);
    $project_id = NULL;
    $post_id = NULL;
    $lecture_category_id = NULL;

    if ($category === 'project') {
        $project_id = Project::all()->random()->id;
    } elseif ($category === 'post') {
        $post_id = Post::all()->random()->id;
    } else {
        $lecture_category_id = LectureCategory::all()->random()->id;
    }

    while(Like::where([
        'user_id' => $user->id,
        'project_id' => $project_id,
        'post_id' => $post_id,
        'lecture_category_id' => $lecture_category_id,
    ])->first()) $user = User::all()->random();

    return [
        'user_id' => $user->id,
        'project_id' => $project_id,
        'post_id' => $post_id,
        'lecture_category_id' => $lecture_category_id,
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
