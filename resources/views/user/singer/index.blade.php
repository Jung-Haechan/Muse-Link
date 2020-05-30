@extends('layouts.app')

@include('user.singer.jumbotron')

@section('content')
    <div class="container">
        <div class="col-md-11 p-3 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; opacity: 0.9; color: #d6d8db">
            @forelse($users as $user)
                <a href="{{ route('user.show', ['singer', $user->id]) }}" class="text-decoration-none text-dark">
                    <div class="row p-2 m-2 bg-light" style="font-size: 0.9rem">
                        <div class="col-1 px-2">
                            <img src="{{ asset($user->profile_img) }}" style="width: 4rem" alt="">
                        </div>
                        <div class="col-3 text-center">
                            <div>
                                {{ $user->name }}
                            </div>
                            <div class="mt-2">
                                <span class="bg-dark text-light p-1">{{ $user->exhibits()->where('role', 'singer')->first() ? getTime($user->exhibits()->where('role', 'singer')->first()->created_at) : getTime($user->created_at) }}</span>
                            </div>
                        </div>
                        <div class="col-5">
                            {{ $user->introduce }}
                        </div>
                        <div class="col-2" style="font-size: 0.8rem;">
                            참여한 프로젝트: {{ $user->singer_num }}
                        </div>
                        <div class="col-1">
                            <img src="{{ getFile('storage/icon/gender-'.$user->gender.'.jpg') }}" style="width:3rem;"
                                 alt="">
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
