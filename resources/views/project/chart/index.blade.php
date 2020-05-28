@extends('layouts.app')

@section('jumbotron')
    <div class="text-center">
        <h3 class="section-subtitle font-weight-bold mb-3" style="color: #d2ab39;">여러분의 작품이 차트에 올라갔나요?</h3>
    </div>
    <div class="section-title text-center text-light display-3">
        <a href="{{ route('project.index', 'completed') }}"
           class="text-light text-decoration-none">Chart</a>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-11 p-3 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">
            <h3 class="text-center">
                {{ config('translate.period.'.$period) }} 차트
            </h3>
            @forelse($projects as $num => $project)
                <a href="{{ route('project.show', ['completed', $project->id]) }}"
                   class="text-dark text-decoration-none">
                    <div class="row p-2 m-2 bg-light">
                        <div class="col-1 px-2">
                            {{ $num+1 }}위
                        </div>
                        <div class="col-1 px-2">
                            <img src="{{ getFile($project->cover_img_file) }}" style="width: 4rem" alt="">
                        </div>
                        <div class="col-3">
                            {{ $project->title }}
                        </div>
                        <div class="col-2">
                            {{ $project->genre }}
                        </div>
                        <div class="col-4">
                            <audio controls="controls" class="w-100">
                                <source
                                    src="{{ getFile($project->audio_version->project_audio_file) }}">
                            </audio>
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
                </a>
            @empty
            @endforelse
            <div class="mx-auto">
                {{ $projects->links() }}
            </div>
        </div>
    </div>


@endsection
