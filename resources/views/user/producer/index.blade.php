@extends('layouts.app')

@include('user.producer.jumbotron')

@section('content')
    <div class="container">
        <div class="col-md-11 p-3 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; opacity: 0.9; color: #d6d8db">
            @forelse($users as $user)
                <a href="{{ route('user.show', ['producer', $user->id]) }}" class="text-dark text-decoration-none">
                    <div class="row p-2 m-2 bg-light" style="font-size: 0.9rem">
                        <div class="col-1 px-2">
                            <img src="{{ asset($user->profile_img) }}" style="width: 4rem" alt="">
                        </div>
                        <div class="col-2 px-2">
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
                                <div class="font-weight-bolder">{{ $user->name }}</div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="mb-2">
                                최근 활동
                            </div>
                            <span class="bg-dark text-light p-1">{{ getTime($user->exhibits()->where('role', '!=', 'singer')->first()->created_at) }}</span>
                        </div>
                        <div class="col-5">
                            {{ $user->introduce }}
                        </div>
                        <div class="col-2" style="font-size: 0.8rem;">
                            @foreach(config('translate.role') as $role_eng => $role_kor)
                                @if($role_eng === 'singer' || $role_eng === 'master')
                                    @continue
                                @endif
                                <div>
                                    {{$role_kor}} 참여: {{ $user[$role_eng.'_num'] }}
                                </div>
                            @endforeach
                            <div>
                                개설한 프로젝트: {{ $user['my_projects_num'] }}
                            </div>
                        </div>
                    </div>
                </a>
            @empty
            @endforelse
            <div class="m-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>


@endsection
