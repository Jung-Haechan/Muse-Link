<div class="bg-secondary p-3 mb-3 text-center">
    @if($face_exhibit)
        @if($face_exhibit->youtube_url)
            <iframe src="{{ getYoutubeUrl($face_exhibit->youtube_url) }}" class="mb-5"
                    frameborder="0" allowfullscreen style="width:23rem; height: 23rem;"></iframe>
        @else
            <div class="project-image mx-auto mb-3"
                 style="background-image: url({{ getFile($face_exhibit->cover_img_file) }}); background-size: cover; background-position: center;">
                <div class="lyrics-background" style="overflow-y: auto;">
                    <div class="lyrics text-light p-md-5 p-3"
                         style="white-space:pre-wrap">{{ $face_exhibit->lyrics }}
                    </div>
                </div>
            </div>
            <audio controls="controls">
                <source
                    src="{{ getFile($face_exhibit->audio_file) }}">
            </audio>
        @endif
    @else
        <div class="project-image mx-auto mb-3"
             style="background-image: url({{NULL}}); background-size: cover; background-position: center;">
            <div class="lyrics-background" style="overflow-y: auto;">
                <div class="lyrics text-light p-md-5 p-3"
                     style="white-space:pre-wrap">{{ NULL }}
                </div>
            </div>
        </div>
        <audio controls="controls">
            <source
                src="{{NULL}}">
        </audio>
    @endif

</div>
