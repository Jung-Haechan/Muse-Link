@extends('layouts.app')

@include('project.completed.jumbotron')

@section('content')
    <div>
        <div class="container col-md-10 p-md-5 pt-3 mx-auto text-dark"
             style="background-color: #b9bbbe;  min-height: 1000px; opacity: 0.93; color: #d6d8db;">

            <div class="row">
                <div class="col-md-6">
                    @include('project.completed.show.face')
                </div>
                <div class="col-md-6">
                    @include('project.completed.show.info')
                    @include('project.completed.show.button')
                </div>
            </div>
            @include('project.completed.show.collaborator')
            <hr>
            @include('project.completed.show.reply')
        </div>
    </div>
@endsection
