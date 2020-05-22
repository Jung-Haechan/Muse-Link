<div class="bg-secondary p-3 mb-3 text-center">
    <div class="project-image mx-auto mb-3"
         style="background-image: url({{ $project->cover_img_file ? asset(getFile($project->cover_img_file)) : asset('storage/base/base_logo.jpg') }}); background-size: cover; background-position: center;">
        <div class="lyrics-background" style="overflow-y: auto;">
            <div class="lyrics text-light p-md-5 p-3"
                 style="white-space:pre-wrap">{{ $project->lyrics_version ? $project->lyrics_version->lyrics : NULL }}
            </div>
        </div>
    </div>
    <audio controls="controls">
        <source
            src="{{ $project->audio_version ? asset(getFile($project->audio_version->project_audio_file)) : NULL }}">
    </audio>
</div>
