<div class="bg-secondary p-3 mb-3 text-center">
    <div class="project-image mx-auto mb-3"
         style="background-image: url({{ getFile($project->cover_img_file) }}); background-size: cover; background-position: center;">
        <div class="lyrics-background" style="overflow-y: auto;">
            <div class="lyrics text-light p-md-5 p-3"
                 style="white-space:pre-wrap">{{ $project->lyrics_version ? $project->lyrics_version->lyrics : NULL }}
            </div>
        </div>
    </div>
    <audio controls="controls">
        <source
            src="{{ $project->audio_version ? getFile($project->audio_version->project_audio_file) : NULL }}">
    </audio>
</div>
