<div class="accordion bg-secondary p-3" id="projectTree">
    <div class="text-light mb-2">
        작품
        @if (isUserAdmin(Auth::user(), $user))
            <span class="float-right">
            <a href="{{ route('user.exhibit.create', [$user->id, 'singer']) }}" class="text-decoration-none text-light">
                추가하기
            </a>
            </span>
        @endif
    </div>
    @forelse($exhibits as $exhibit)
        <div class="card">
            @if($user->id === Auth::id())
                <div class="text-right bg-light pr-1">
                    <form action="{{ route('user.exhibit.delete', [$user->id, 'singer', $exhibit->id]) }}"
                          method="post">
                        @csrf
                        @method('delete')
                        <div>
                            <a href="{{ route('user.exhibit.edit', [$user->id, 'singer', $exhibit->id]) }}"
                               class="btn" style="font-size: 0.7rem;">수정</a>
                            <button type="submit" class="btn" style="font-size: 0.7rem;">
                                삭제
                            </button>
                        </div>
                    </form>
                </div>
            @endif
            <form action="{{ route('user.update_face', [$user->id, 'singer']) }}" method="post">
                @csrf
                @method('put')
                <div class="card-header" id="heading{{$exhibit->id}}">
                    <h2 class="mb-0">
                        <div
                            class="text-decoration-none text-left text-{{ getRoleColor($exhibit->role) }}"
                            type="button"
                            data-toggle="collapse"
                            data-target="#collapse{{ $exhibit->id }}"
                            aria-expanded="true" aria-controls="collapse{{$exhibit->id}}">
                            <div style="font-size: 1.1rem;">
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
                                        <input type="hidden" name="exhibit_id"
                                               value="{{ $exhibit->id }}">
                                        @if (isFaceExhibit($user, $exhibit, 'singer'))
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
        </div>
    @empty
    @endforelse
</div>
