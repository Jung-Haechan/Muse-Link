<div class="accordion bg-secondary p-3" id="projectTree">
    <div class="text-light mb-2">
        작품
        @if (isUserAdmin(Auth::user(), $user))
            <span class="float-right">
            <a href="{{ route('user.exhibit.create', [$user->id, 'producer']) }}"
               class="text-decoration-none text-light">
                추가하기
            </a>
            </span>
        @endif
    </div>
    @forelse($exhibits as $exhibit)
        <div class="card">
            @if($user->id === Auth::id())
                <div class="text-right bg-light pr-1">
                    <form action="{{ route('user.exhibit.delete', [$user->id, 'producer', $exhibit->id]) }}"
                          method="post">
                        @csrf
                        @method('delete')
                        <div>
                            <a href="{{ route('user.exhibit.edit', [$user->id, 'producer', $exhibit->id]) }}"
                               class="btn" style="font-size: 0.7rem;">수정</a>
                            <button type="submit" class="btn" style="font-size: 0.7rem;">
                                삭제
                            </button>
                        </div>
                    </form>
                </div>
            @endif
            <form action="{{ route('user.update_face', [$user->id, $board]) }}" method="post">
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
                            <div style="font-size: 1.1rem;">
                                [{{ config('translate.role.'.$exhibit->role) }}
                                ] {{ $exhibit->title }}</div>
                        </div>
                        <div class="container pt-2" style="font-size: 0.8rem;">
                            <div class="row">
                                <span class="text-secondary mr-3">
                                    {{ getTime($exhibit->created_at) }}
                                </span>
                                <div>
                                    <span
                                        class="text-{{ getAccessibilityColor($exhibit->is_opened) }} border border-{{ getAccessibilityColor($exhibit->is_opened) }}"
                                        style="font-size: 0.7rem; padding: 2px;">
                                        {{ config('translate.is_opened')[$exhibit->is_opened] }}
                                    </span>
                                </div>
                                @if(isUserAdmin(Auth::user(), $user))
                                    <div class="ml-auto">
                                        <input type="hidden" name="exhibit_id"
                                               value="{{ $exhibit->id }}">
                                        @if (isFaceExhibit($user, $exhibit, 'producer'))
                                            <button type="submit"
                                                    class="btn btn-outline-dark btn-sm bg-dark text-light disabled"
                                                    style="cursor:auto;" disabled>
                                                대표 작품
                                            </button>
                                        @else
                                            <button type="submit"
                                                    class="btn btn-outline-dark btn-sm bg-light text-dark">
                                                대표 작품으로 설정
                                            </button>
                                        @endif
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
                        @if(canAccessExhibit(Auth::user(), $exhibit))
                            {{ $exhibit->description }}
                            <div class="text-center pt-3">
                                @if($exhibit->audio_file)
                                    <a href="{{ route('user.exhibit.audio', [$user->id, 'producer', $exhibit->id]) }}"
                                       onclick="window.open(this.href, '_blank', 'width=400,height=100,toolbars=no,scrollbars=no'); return false;">바로 듣기</a>
                                @elseif($exhibit->youtube_url)
                                    <a target="_blank"
                                       href="{{ $exhibit->youtube_url }}">유튜브로 듣기</a>
                                @endif
                            </div>
                        @else
                            접근 권한이 없습니다.
                        @endif
                    </div>
                </div>
            @endif
        </div>
    @empty
        <div class="text-center text-light">작품이 없습니다.</div>
    @endforelse
</div>
