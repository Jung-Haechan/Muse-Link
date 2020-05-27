<div class="bg-secondary p-3 mb-3">
    <div class="row">
        @if($face_exhibit)
            <div class="col-6 text-center">
                @if($face_exhibit->youtube_url)
                    <iframe src="{{ getYoutubeUrl($face_exhibit->youtube_url) }}" class=""
                            frameborder="0" allowfullscreen style="width:23rem; height: 16rem;"></iframe>
                @else
                    <audio controls="controls">
                        <source
                            src="{{ getFile($face_exhibit->audio_file) }}">
                    </audio>
                @endif
            </div>
            <div class="col-6 text-light">
                <h4>{{ $face_exhibit->title }}</h4>
                <div>{{ $face_exhibit->description }}</div>
            </div>
        @else
            <div class="col-12 text-light">대표 노래 없음</div>
        @endif
    </div>
</div>
