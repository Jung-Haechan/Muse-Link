<div class="accordion bg-secondary p-3 mt-3" id="projectTree">
    @forelse($versions as $version)
        <div class="card">
            @if(isProjectAdmin(Auth::user(), $project))
                <div class="text-right bg-light pr-1">
                    <form action="{{ route('project.version.delete', [$project->id, $version->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn" style="font-size: 0.7rem;">
                            삭제
                        </button>
                    </form>
                </div>
            @endif
            <form action="{{ route('project.update_face', $project->id) }}" method="post">
                @csrf
                @method('put')
                <div class="card-header" id="heading{{$version->rownum}}">
                    <h2 class="mb-0">
                        <div
                            class="text-decoration-none text-left text-{{ getRoleColor($version->role) }}"
                            type="button"
                            data-toggle="{{ $version->role === 'lyricist' ? 'modal' : 'collapse' }}"
                            data-target="#{{ $version->role === 'lyricist' ? 'lyricsModal'.$version->rownum : 'collapse'.$version->rownum }}"
                            aria-expanded="true" aria-controls="collapse{{$version->rownum}}">
                            <div style="font-size: 1.1rem;">#{{ $version->rownum }}
                                [{{ config('translate.role.'.$version->role) }}
                                ] {{ $version->title }}</div>
                        </div>
                        <div class="container pt-2" style="font-size: 0.8rem;">
                            <div class="row">
                                <div>
                                    {{ $version->user->name }}
                                </div>
                                @if(isProjectAdmin(Auth::user(), $project))
                                    <div class="ml-auto">
                                        <input type="hidden" name="role"
                                               value="{{ $version->role }}">
                                        <input type="hidden" name="version_id"
                                               value="{{ $version->id }}">
                                        <button type="submit" class="btn btn-outline-dark btn-sm
                                        @if($project->audio_version_id === $version->id)bg-dark text-light disabled"
                                                style="cursor:auto;" disabled> 대표 음악
                                            @elseif($project->lyrics_version_id === $version->id)
                                                bg-dark text-light disabled" style="cursor:auto;" disabled> 대표 가사
                                            @else "> 대표
                                            @if($version->role === 'lyricist') 가사로
                                            @else 음악으로
                                            @endif
                                            설정
                                            @endif
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </h2>
                </div>
            </form>
            @if($version->role !== 'lyricist')
                <div id="collapse{{$version->rownum}}" class="collapse show "
                     aria-labelledby="heading{{$version->rownum}}"
                     data-parent="#projectTree">
                    <div class="card-body">
                        {{ $version->description }}
                        <table class="table table-hover table-sm mt-1 text-center"
                               style="margin-bottom: 0rem;">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2">AudioFile</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @if($version->project_audio_file)
                                    <td>메인 파일: <a href="#">{{ $version->title }} 메인.mp3</a>
                                    </td> @endif
                                @if($version->mr_audio_file)
                                    <td>MR 파일: <a href="#">{{ $version->title }} MR.mp3</a>
                                    </td> @endif
                                @if($version->voice_audio_file)
                                    <td>목소리 파일: <a href="#">{{ $version->title }}.mp3</a>
                                    </td> @endif
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    @empty
    @endforelse
</div>
