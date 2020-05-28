@extends('layouts.app')

@section('jumbotron')
    <div class="text-center">
        <h3 class="font-weight-bold mb-3 section-subtitle" style="color: #d2ab39;">음악가들과 자유롭게 소통하세요!</h3>
    </div>
    <h1 class="text-center text-light">
        <div class="display-1 section-title"><a href="{{ route('post.index') }}"
                                                class="text-light text-decoration-none">Forum</a>
        </div>
    </h1>
@endsection

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
