@extends('layouts.app')

@include('user.singer.jumbotron')

@section('content')
    <div>
        <div class="container col-md-10 mx-auto text-dark"
             style="background-color: #b9bbbe;  min-height: 1000px; opacity: 0.93; color: #d6d8db;">
            @include('user.producer.show.nav')
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
    </div>
@endsection
