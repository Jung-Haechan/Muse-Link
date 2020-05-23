@extends('layouts.app')

@section('jumbotron')

    <div class="text-center">
        <h3 class="font-weight-bold mb-3 section-subtitle" style="color: #d2ab39;">
            당신과 협업할
            @if($board === 'producer')
                프로듀서를
            @elseif($board === 'singer')
                가수를
            @endif
            찾아보세요!
        </h3>
    </div>
    <h1 class="text-center text-light">
        <div class="display-1 section-title"><a href="{{ route('user.index', $board) }}"
                                                class="text-light text-decoration-none">{{ $board }}s</a>
        </div>
    </h1>


@endsection

@section('content')
    <div class="container">
        @forelse($users as $user)
            <div class="row p-2 bg-light">
                <div class="px-2">
                    <img src="{{ asset($user->profile_img) }}" style="width: 4rem" alt="">
                </div>
                <div class="px-2">
                    @foreach(config('translate.role') as $role_eng => $role_kor)
                        @if($role_eng === 'singer')
                            @continue
                        @endif
                        @if($user['is_'.$role_eng])
                            <div class="d-inline text-{{getRoleColor($role_eng)}}">
                                [{{ $role_kor }}]
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-2">
                    {{ $user->name }} {{getProjectCreatedTime($user->created_at)}}
                </div>
                <div class="col-6">
                    {{ $user->introduce }}
                </div>
                <div class="col-2">
                    @foreach(config('translate.role') as $role_eng => $role_kor)
                        @if($role_eng === 'singer' || $role_eng === 'master')
                            @continue
                        @endif
                        <div>
                            {{$role_kor}} 참여: {{ $user[$role_eng.'_num'] }}
                        </div>
                    @endforeach
                        <div>
                            개설한 프로젝트: {{ $user['master_num'] }}
                        </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
@endsection
