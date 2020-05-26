<div class="bg-secondary p-3 mb-3 text-center">
    <div class="project-image mx-auto mb-3"
         style="background-image: url({{ $face_exhibit ? getFile($face_exhibit->cover_img_file) : NULL }}); background-size: cover; background-position: center;">
        <div class="lyrics-background" style="overflow-y: auto;">
            <div class="lyrics text-light p-md-5 p-3"
                 style="white-space:pre-wrap">{{ $face_exhibit ? $face_exhibit->lyrics : NULL }}
            </div>
        </div>
    </div>
    <audio controls="controls">
        <source
            src="{{ $face_exhibit ? getFile($face_exhibit->audio_file) : NULL }}">
    </audio>
</div>
