@extends('layouts.app')

@section('jumbotron')

@endsection

@section('content')
    <div>
        <div class="container col-md-10 p-5 mx-auto text-dark"
             style="background-color: #b9bbbe;  min-height: 1000px; opacity: 0.93; color: #d6d8db">

            <div class="row">
                <div class="col-md-6">
                    <div class="project-image mx-auto mb-3"
                         style="background-image: url({{ $project->cover_img_file ? asset(getFile($project->cover_img_file)) : asset('storage/base/base_logo.jpg') }}); background-size: cover; background-position: center;">
                        <div class="lyrics-background" style="overflow-y: scroll;">
                            <div class="lyrics text-light p-5"
                                 style="white-space:pre-wrap">{{ $project->lyrics_version ? $project->lyrics_version->lyrics : NULL }}
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <audio controls="controls">
                            <source
                                src="{{ $project->audio_version ? asset(getFile($project->audio_version->project_audio_file)) : NULL }}">
                        </audio>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="accordion " id="accordionExample" style="">
                        @forelse($versions as $version)
                            <div class="card">
                                <div class="card-header" id="heading{{$version->rownum}}">
                                    <h2 class="mb-0">
                                        <button
                                            class="btn btn-link text-decoration-none text-left text-{{ getRoleColor($version->role) }}"
                                            type="button"
                                            data-toggle="{{ $version->role === 'lyricist' ? 'modal' : 'collapse' }}"
                                            data-target="#{{ $version->role === 'lyricist' ? 'lyricsModal'.$version->rownum : 'collapse'.$version->rownum }}"
                                            aria-expanded="true" aria-controls="collapse{{$version->rownum}}">
                                            <div>#{{ $version->rownum }} [{{ config('translate.role.'.$version->role) }}
                                                ] {{ $version->title }}</div>
                                            <div class="pt-2" style="font-size: small">{{ $version->user->name }}</div>
                                        </button>
                                    </h2>
                                </div>
                                <form action="{{ route('project.update_face', $project->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="role" value="{{ $version->role }}">
                                    @if ($version->role === 'lyricist')
                                        <input type="hidden" name="version_id" value="{{ $version->id }}">
                                        <button type="submit">대표 가사로 설정</button>
                                    @else
                                        <input type="hidden" name="version_id" value="{{ $version->id }}">
                                        <button type="submit">대표 음악으로 설정</button>
                                    @endif
                                </form>
                                @if($version->role !== 'lyricist')
                                    <div id="collapse{{$version->rownum}}" class="collapse show "
                                         aria-labelledby="heading{{$version->rownum}}"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            {{ $version->description }}
                                            <table class="table table-hover table-sm mt-1 text-center"
                                                   style="margin-bottom: 0rem;">
                                                <thead>
                                                <tr>
                                                    <th scope="col">AudioFile</th>

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
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body" style="min-height: 10rem; ">
                    {{ $project->description }}
                </div>
            </div>
            <div class="container mt-3 mb-3 text-center">
                <div class="row text-center mx-auto">
                    @foreach(config('translate.role') as $role_eng => $role_kor)
                        <div style="display: inline">
                            @if($collaboratorStatus[$role_eng] === NULL)
                                <form class="form-inline"
                                      action="{{ route('project.collaborator.store', $project->id) }}"
                                      method="post">
                                    @csrf
                                    <input type="hidden" name="role" value="{{ $role_eng }}">
                                    <button type="{{ $collaboratorStatus[$role_eng] === NULL ? 'submit' : NULL }}"
                                            class="btn btn-outline-{{ getRoleColor($role_eng) }} font-weight-bold bg-light">
                                        {{ $role_kor }} 신청
                                    </button>
                                </form>
                            @elseif($collaboratorStatus[$role_eng] === 0)
                                <a href="#"
                                   class="btn btn-outline-{{ getRoleColor($role_eng) }} font-weight-bold bg-light">
                                    {{ $role_kor }} 신청 취소
                                </a>
                            @elseif($collaboratorStatus[$role_eng] === 1)
                                <a href="{{ route('project.version.create', [$project->id, $role_eng]) }}"
                                   class="btn btn-outline-{{ getRoleColor($role_eng) }} font-weight-bold bg-light">
                                    {{ $role_kor }} 등록
                                </a>
                            @else
                                <a href="#"
                                   class="btn btn-outline-{{ getRoleColor($role_eng) }} font-weight-bold bg-light disabled"
                                   disabled="true">
                                    {{ $role_kor }} 신청 거부당함
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
                @inject('AuthTrait', 'App\Traits\TraitsForView\AuthTraitForView')
                @if($AuthTrait->isProjectAdmin(Auth::user(), $project))
                    <a href="{{ route('project.collaborator.index', $project->id) }}">참여자 관리</a>
                @endif
                <hr>
            </div>
        </div>
    </div>

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
                            <div class="font-weight-bold" style="white-space:pre-wrap">{{ $version->lyrics }}</div>
                            <hr>
                            <div> {{ $version->description }}</div>
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
@endsection
