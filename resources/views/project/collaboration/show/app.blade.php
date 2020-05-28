@extends('layouts.app')

@include('project.collaboration.jumbotron')

@section('content')
    <div>
        <div class="container col-md-10 p-md-5 pt-3 mx-auto text-dark"
             style="background-color: #b9bbbe;  min-height: 1000px; opacity: 0.93; color: #d6d8db;">

            <div class="row">
                <div class="col-md-6">
                    @include('project.collaboration.show.face')
                </div>
                <div class="col-md-6">
                    @include('project.collaboration.show.info')
                    @include('project.collaboration.show.button')
                </div>
            </div>
            @include('project.collaboration.show.version')
            <hr>
            @include('project.collaboration.show.reply')
        </div>
    </div>
    @include('project.collaboration.show.modal')
@endsection
