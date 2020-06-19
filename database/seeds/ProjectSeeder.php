<?php

use App\Models\Collaborator;
use App\Models\Project;
use App\Models\Version;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Project::class, 100)->create();
        $projects = Project::all();
        foreach ($projects as $project) {
            Collaborator::create([
                'user_id' => $project->user_id,
                'project_id' => $project->id,
                'role' => 'master',
                'is_approved' => 1,
            ]);
        }
        factory(Collaborator::class, 500)->create();
        factory(Version::class, 500)->create();
        foreach($projects as $project) {
            $audio_versions = $project->versions()
                ->where(function($query) {
                    $query->where('role', 'composer')
                        ->orWhere('role', 'editor')
                        ->orWhere('role', 'singer');
                });
            $lyrics_versions = $project->versions()
                ->where('role', 'lyricist');
            $has_audio_version = $audio_versions->first();
            $has_lyrics_version = $lyrics_versions->first();
            if ($has_audio_version) {
                $project->update([
                    'audio_version_id' => $audio_versions->get()->random()->id
                ]);
            }
            if ($has_lyrics_version) {
                $project->update([
                    'lyrics_version_id' => $lyrics_versions->get()->random()->id
                ]);
            }
            if($project->versions()->first()) {
                $project->update([
                    'last_updated_at' => $project->versions()->first()->created_at,
                ]);
            }
        }
    }
}
