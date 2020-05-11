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
                        <div class="lyrics-background" style="overflow-y: auto;">
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
                    <div class="accordion " id="projectTree" style="">
                        @forelse($versions as $version)
                            <div class="card">
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
                                                    [{{ config('translate.role.'.$version->role) }}] {{ $version->title }}</div>
                                            </div>
                                            <div class="container pt-2" style="font-size: 0.8rem;">
                                                <div class="row">
                                                    <div>
                                                        {{ $version->user->name }}
                                                    </div>
                                                    <div class="ml-auto">
                                                        <input type="hidden" name="role"
                                                               value="{{ $version->role }}">
                                                        @if ($version->role === 'lyricist')
                                                            <input type="hidden" name="version_id"
                                                                   value="{{ $version->id }}">
                                                            <button type="submit" class="btn btn-outline-dark btn-sm">대표
                                                                가사로 설정
                                                            </button>
                                                        @else
                                                            <input type="hidden" name="version_id"
                                                                   value="{{ $version->id }}">
                                                            <button type="submit" class="btn btn-outline-dark btn-sm ">
                                                                대표
                                                                음악으로 설정
                                                            </button>
                                                        @endif
                                                    </div>
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
            <div class="card bg-dark mt-4">
                <div class="card-body bg-dark text-light" style="min-height: 10rem;">
                    {{ $project->description }}
                </div>
            </div>
            <div class="mt-3 mb-3 text-center">
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
                    @inject('AuthTrait', 'App\Traits\TraitsForView\AuthTraitForView')
                    @if($AuthTrait->isProjectAdmin(Auth::user(), $project))
                        <a href="{{ route('project.collaborator.index', $project->id) }}"
                           class="btn btn-outline-dark bg-light font-weight-bold" style="">참여자 관리</a>
                    @endif
                </div>

                <hr>

                <div class="bg-light" style="min-height: 100rem;">
                    <div class="container pt-3">
                        <form>
                            <div class="form-group" style="margin-bottom: 0.3rem;">
                                <label for="description" style="display: none"></label>
                                <textarea type="text" class="form-control" id="description" name="description"
                                          placeholder="댓글을 입력하세요." cols="30" rows="5"></textarea>
                            </div>
                            <div class="text-right mb-4">
                                <button type="submit" class="btn btn-outline-dark btn-sm">등록</button>
                            </div>
                        </form>

                        <hr style="margin: 0.1rem;">
                        <div class="container">
                            <div class="row">
                                <div class="ml-auto" style="font-size: 0.7rem;">2019.03.04.13:12</div>
                            </div>
                            <div class="row">
                                <div class="col-1 font-weight-bold">1</div>
                                <div class="container col-10">
                                    <div class="row">
                                        <img src="{{Auth::user()->profile_img}}" style="width: 1.5rem"
                                             class="my-auto mr-1">
                                        <div class="font-weight-bold">우리들의 일그러진 영웅</div>
                                    </div>
                                    <div class="container">
                                        <div class="row text-left mt-2">
                                            오 이거 정말 띵곡이네요!! 저 작사 지원 가능합니까??
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="ml-auto">
                                        <div class="row text-primary">
                                            <div class="mr-2"><a href="#" class="text-decoration-none">답글3</a></div>
                                            <div><a href="#" class="text-decoration-none">추천5</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="margin: 0.1rem;">
                    </div>
                </div>

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
