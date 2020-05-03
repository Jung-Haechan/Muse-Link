@extends('layouts.app')

@section('jumbotron')
    <h3 class="text-center">
        <div class="font-weight-bold mb-3" style="color: #d2ab39;">당신의 미완성 작품을 공유하세요!</div>
    </h3>
    <h1 class="text-center text-light">
        <div class="display-1"><a href="http://127.0.0.1:8000/music/collaboration"
                                  class="text-light text-decoration-none">Collaboration</a></div>
    </h1>
    <a href="{{ route('music.create') }}" class="btn btn-outline-light mt-3">음악 만들기</a>
@endsection

@section('content')


@endsection
