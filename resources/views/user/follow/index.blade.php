@extends('layouts.app')

@section('jumbotron.comment', '당신의 음악 인맥을 넓혀 보세요!')
@section('jumbotron.url', route('user.follow.index', [$user->id, 'follow']))
@section('jumbotron.page', 'Follow')

@section('content')
    <div class="container">
        <div class="col-md-11 mx-auto pb-2"
             style="background-color: #4e555b; margin-top: 50px; opacity: 0.9; color: #d6d8db">
            <nav class="row">
                <div class="col-6 pt-2 {{ $board === 'follower' ? '' : 'bg-dark' }}">
                    <a class="text-decoration-none {{ $board === 'follower' ? 'text-light' : 'text-secondary' }}"
                       href="{{ route('user.follow.index', [$user->id, 'follower']) }}">
                        <h4 class="text-center">
                            팔로워
                        </h4>
                    </a>
                </div>
                <div class="col-6 pt-2 {{ $board === 'followee' ? '' : 'bg-dark' }}">
                    <a class="text-decoration-none {{ $board === 'followee' ? 'text-light' : 'text-secondary' }}"
                       href="{{ route('user.follow.index', [$user->id, 'followee']) }}">
                        <h4 class="text-center">
                            팔로잉
                        </h4>
                    </a>
                </div>
            </nav>
            @forelse($fellows as $fellow)
                <div style="display: none">
                    {{ $fellow = $board === 'follower' ? $fellow->user : $fellow->followee }}
                </div>
                <a href="{{ route('user.show', [$fellow->is_producer ? 'producer' : 'singer', $fellow->id]) }}" class="text-dark text-decoration-none">
                    <div class="row p-2 m-2 bg-light" style="font-size: 0.9rem">
                        <div class="col-1 px-2">
                            <img src="{{ asset($fellow->profile_img) }}" style="width: 4rem" alt="">
                        </div>
                        <div class="col-2 px-2 text-center">
                            @foreach(config('translate.role') as $role_eng => $role_kor)
                                @if($fellow['is_'.$role_eng])
                                    <div class="d-inline text-{{getRoleColor($role_eng)}}">
                                        [{{ $role_kor }}]
                                    </div>
                                @endif
                            @endforeach
                            <div class="font-weight-bolder">{{ $fellow->name }}</div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="mb-2">
                                최근 활동
                            </div>
                            <span
                                class="bg-dark text-light p-1">{{ $fellow->exhibits()->first() ? getTime($fellow->exhibits()->first()->created_at) : '활동 없음' }}</span>
                        </div>
                        <div class="col-6">
                            {{ $fellow->introduce }}
                        </div>
                        <div class="col-1" style="font-size: 0.8rem;">
                            <img src="{{ getFile('storage/icon/gender-'.$fellow->gender.'.jpg') }}" style="width:3rem;"
                                 alt="">
                        </div>
                    </div>
                </a>
            @empty
                <div class="text-center text-light">팔로워가 없습니다.</div>
            @endforelse
            <div class="m-3">
                {{ $fellows->links() }}
            </div>
        </div>
    </div>
@endsection

