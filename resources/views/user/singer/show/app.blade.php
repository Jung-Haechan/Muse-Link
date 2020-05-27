@extends('layouts.app')

@section('jumbotron')
    <div class="text-center">
        <h3 class="font-weight-bold mb-3 section-subtitle" style="color: #d2ab39;">
            Singer
        </h3>
    </div>
    <h1 class="text-center text-light">
        <div class="display-1 section-title"><a href="{{ route('user.show', ['singer', $user->id]) }}"
                                                class="text-light text-decoration-none">{{ $user->name }}</a>
        </div>
    </h1>
@endsection

@section('content')
    <div>
        <div class="container col-md-10 mx-auto text-dark"
             style="background-color: #b9bbbe;  min-height: 1000px; opacity: 0.93; color: #d6d8db;">
            @include('user.singer.show.nav')
            <div class="p-md-4 py-4">
                @include('user.singer.show.info')
                <div>
                    @include('user.singer.show.face')
                </div>
                <div class="mb-3">
                    @include('user.producer.show.button')
                </div>
                @include('user.singer.show.exhibit')
                <div class="row mt-3">
                    <div class="col-lg-4">
                        @include('user.singer.show.opened_project')
                    </div>
                    <div class="col-lg-4">
                        @include('user.singer.show.joined_project')
                    </div>
                    <div class="col-lg-4">
                        @include('user.singer.show.follower')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
