<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use App\Models\Version;
use Faker\Generator as Faker;

$factory->define(Version::class, function (Faker $faker) {
    $project = Project::all()->random();
    $collaborator = $project->collaborators()->where('is_approved', 1)->get()->random();
    $user = $collaborator->user;
    $role = $collaborator->role === 'master' ?
        $faker->randomElement(['composer', 'editor', 'lyricist', 'singer']) :
        $collaborator->role;
    if($role === 'lyricist') {
        $project_audio_file = NULL;
        $lyrics = $faker->realText();
    } else {
        $project_audio_file = 'public/base/base_audio.wav';
        $lyrics = NULL;
    }

    return [
        'user_id' => $user->id,
        'project_id' => $project->id,
        'title' => $faker->realText(20),
        'description' => $faker->realText(100),
        'role' => $role,
        'project_audio_file' => $project_audio_file,
        'lyrics' => $lyrics,
        'is_opened' => $faker->numberBetween(0, 4),
        'created_at' => $faker->dateTimeBetween('-10 months', 'now', 'asia/Seoul'),
        'updated_at' => now('asia/Seoul'),
    ];
});
