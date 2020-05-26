@forelse($exhibits as $exhibit)
    @if($exhibit->role === 'lyricist')
        <div class="modal fade" id="lyricsModal{{ $exhibit->id }}" tabindex="-1" role="dialog"
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
                        <div class="font-weight-bold" style="white-space:pre-wrap">{{ $exhibit->lyrics }}</div>
                        <hr>
                        <div> {{ $exhibit->description }}</div>
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
