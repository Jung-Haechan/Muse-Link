@extends('layouts.app')

@section('jumbotron')
    <div class="text-center">
        <h3 class="font-weight-bold mb-3 section-subtitle" style="color: #d2ab39;">
            Producer
        </h3>
    </div>
    <h1 class="text-center text-light">
        <div class="display-1 section-title"><a href="{{ route('user.show', ['producer', $user->id]) }}"
                                                class="text-light text-decoration-none">{{ $user->name }}</a>
        </div>
    </h1>
@endsection

@section('content')
    <div>
        <div class="container col-md-10 p-md-5 pt-3 mx-auto text-dark"
             style="background-color: #b9bbbe;  min-height: 1000px; opacity: 0.93; color: #d6d8db;">
            @include('user.producer.show.info')
            <div class="row">
                <div class="col-md-6">
                    @include('user.producer.show.face')
                </div>
                <div class="col-md-6">
                    @include('user.producer.show.face_info')
                    @include('user.producer.show.button')
                </div>
            </div>
            @include('user.producer.show.exhibit')
            <div class="row mt-3">
                <div class="col-lg-4">
                    @include('user.producer.show.opened_project')
                </div>
                <div class="col-lg-4">
                    @include('user.producer.show.joined_project')
                </div>
                <div class="col-lg-4">
                    @include('user.producer.show.follower')
                </div>
            </div>
        </div>
    </div>
        @include('user.producer.show.modal')
@endsection
