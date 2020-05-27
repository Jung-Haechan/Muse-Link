@extends('layouts.app')

@section('jumbotron')

    <div class="text-center">
        <h3 class="font-weight-bold mb-3 section-subtitle" style="color: #d2ab39;">
            당신과 협업할 가수를 찾아보세요!
        </h3>
    </div>
    <h1 class="text-center text-light">
        <div class="display-1 section-title">
            <a href="{{ route('user.index', 'singer') }}"
                                                class="text-light text-decoration-none">Singers</a>
        </div>
    </h1>


@endsection

@section('content')
    <div class="container py-2"
         style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9;">
        @forelse($users as $user)
            <a href="{{ route('user.show', ['singer', $user->id]) }}" class="text-decoration-none text-dark">
                <div class="row p-2 m-2 bg-light">
                    <div class="col-lg-1 px-2">
                        <img src="{{ asset($user->profile_img) }}" style="width: 4rem" alt="">
                    </div>
                    <div class="col-lg-3">
                        <div>
                            {{ $user->name }}
                        </div>
                        <div>
                            {{getProjectCreatedTime($user->created_at)}}
                        </div>
                    </div>
                    <div class="col-lg-5">
                        {{ $user->introduce }}
                    </div>
                    <div class="col-lg-2">
                        참여한 프로젝트: {{ $user->singer_num }}
                    </div>
                    <div class="col-lg-1">
                        <img src="{{ getFile('storage/icon/gender-'.$user->gender.'.jpg') }}" style="width:3rem;" alt="">
                    </div>
                </div>
            </a>
        @empty
        @endforelse
        <div class="m-3">
            {{ $users->links() }}
        </div>
    </div>

@endsection
