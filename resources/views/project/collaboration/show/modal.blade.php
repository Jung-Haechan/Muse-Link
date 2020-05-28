@forelse($versions as $version)
    @if($version->role === 'lyricist')
        <div class="modal fade" id="lyricsModal{{ $version->rownum }}" tabindex="-1" role="dialog"
             aria-labelledby="lyricsModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lyricsModalLabel">가사</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        @if(canAccessVersion(Auth::user(), $version))
                            <div class="font-weight-bold" style="white-space:pre-wrap">{{ $version->lyrics }}</div>
                            <hr>
                            <div> {{ $version->description }}</div>
                        @else
                            접근 권한이 없습니다
                        @endif
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@empty
@endforelse
