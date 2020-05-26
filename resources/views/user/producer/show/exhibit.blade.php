<div class="accordion bg-secondary p-3" id="projectTree">
    @forelse($exhibits as $exhibit)
        <div class="card">
            @if($user->id === Auth::id())
                <div class="text-right bg-light pr-1">
                    <form action="" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn" style="font-size: 0.7rem;">
                            삭제
                        </button>
                    </form>
                </div>
            @endif
            <form action="" method="post">
                @csrf
                @method('put')
                <div class="card-header" id="heading{{$exhibit->id}}">
                    <h2 class="mb-0">
                        <div
                            class="text-decoration-none text-left text-{{ getRoleColor($exhibit->role) }}"
                            type="button"
                            data-toggle="{{ $exhibit->role === 'lyricist' ? 'modal' : 'collapse' }}"
                            data-target="#{{ $exhibit->role === 'lyricist' ? 'lyricsModal'.$exhibit->id : 'collapse'.$exhibit->id }}"
                            aria-expanded="true" aria-controls="collapse{{$exhibit->id}}">
                            <div style="font-size: 1.1rem;">#{{ $exhibit->id }}
                                [{{ config('translate.role.'.$exhibit->role) }}
                                ] {{ $exhibit->title }}</div>
                        </div>
                        <div class="container pt-2" style="font-size: 0.8rem;">
                            <div class="row">
                                <div>
                                    {{ $exhibit->user->name }}
                                </div>
                                @if($user->id === Auth::id())
                                    <div class="ml-auto">
                                        <input type="hidden" name="version_id"
                                               value="{{ $exhibit->id }}">
                                        <button type="submit"
                                                class="btn btn-outline-dark btn-sm bg-dark text-light disabled"
                                                style="cursor:auto;" disabled>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </h2>
                </div>
            </form>
            @if($exhibit->role !== 'lyricist')
                <div id="collapse{{ $exhibit->id }}" class="collapse show"
                     aria-labelledby="heading{{$exhibit->id}}"
                     data-parent="#projectTree">
                    <div class="card-body">
                        {{ $exhibit->description }}
                    </div>

                    <div class="text-center mb-3">
                        @if($exhibit->audio_file)
                            <audio controls="controls">
                                <source
                                    src="{{ getFile($exhibit->audio_file) }}">
                            </audio>
                        @elseif($exhibit->youtube_url)
                            <a target="_blank" href="{{ $exhibit->youtube_url }}">{{ $exhibit->youtube_url }}</a>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    @empty
    @endforelse
</div>
