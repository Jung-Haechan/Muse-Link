@extends('layouts.app')

@include('post.jumbotron')

@section('content')
    <div class="container">
        <div class="col-md-11 p-3 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; opacity: 0.9;">
            <div class="col-md-10 mx-auto bg-light mt-4" style="border-radius:20px">
                @include('post.show.info')
                @include('post.show.neighbor')
                @include('post.show.reply')
            </div>
            <div class="text-center py-3">
                <a href="" class="btn-lg btn-light">목록으로</a>
            </div>
        </div>
    </div>
@endsection
