@extends('layouts.app')

@section('jumbotron.comment', '당신의 작품이 차트에 있나요?')
@section('jumbotron.url', route('project.index', 'chart').'?period='.$period)
@section('jumbotron.page', 'Chart')

@section('content')
    <div class="container">
        <div class="col-md-11 p-3 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">
            <h3 class="text-center">
                {{ config('translate.period.'.$period) }} 차트
            </h3>
            @forelse($projects as $num => $project)

                    <div class="row p-2 m-2 bg-light text-dark">
                        <div class="col-1 px-2">
                            {{ $num+1 }}위
                        </div>
                        <div class="col-1 px-2">
                            <img src="{{ getFile($project->cover_img_file) }}" style="width: 4rem" alt="">
                        </div>
                        <div class="col-3">
                            <a href="{{ route('project.show', ['completed', $project->id]) }}"
                               class="text-dark text-decoration-none">
                            {{ $project->title }}
                            </a>
                        </div>
                        <div class="col-2">
                            {{ $project->genre }}
                        </div>
                        <div class="col-2">
                            {{ getTime($project->completed_at) }}
                        </div>
                        <div class="col-2">
                            <a href="{{ route('project.audio', ['chart', $project->id]) }}"
                               onclick="window.open(this.href, '_blank', 'width=400,height=100,toolbars=no,scrollbars=no'); return false;">바로 듣기</a>
                        </div>
                        <div class="col-1">
                            <like
                                icon-dir="{{ asset('storage/icon/like.png') }}"
                                project-id="{{ $project->id }}"
                                is-logged-in="{{ json_encode(Auth::check()) }}"
                                likes="{{ json_encode($project['likes_'.$period]) }}"
                                already-like="{{ json_encode($project->already_like) }}"
                            ></like>
                        </div>
                    </div>
            @empty
            @endforelse
        </div>
    </div>


@endsection
