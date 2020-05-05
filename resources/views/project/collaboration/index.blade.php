@extends('layouts.app')

@section('jumbotron')
    <div class="text-center">
        <h3 class="section-subtitle font-weight-bold mb-3" style="color: #d2ab39;">당신의 미완성 프로젝트를 공유하세요!</h3>
    </div>
    <div class="section-title text-center text-light display-3">
        <a href="{{ route('project.index', 'collaboration') }}"
           class="text-light text-decoration-none">Collaboration</a>
    </div>
    <a href="{{ route('project.create') }}" class="btn btn-outline-light mt-3" style="font-size: 1.2rem">프로젝트 만들기</a>
@endsection

@section('content')


    <div class="container">
        <div class="col-md-11 p-5 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">
            <div class="row">
                @forelse($projects as $project)
                    <div class="col-lg-4 mb-3">
                        <a class="text-decoration-none" href="{{ route('project.show', ['collaboration', $project->id]) }}">
                            <div class="card card-music container">
                                <div class="row text-dark bg-dark" style="height: 9rem;">

                                    <img class="card-img-top mb-3 mx-auto"
                                         src="{{ $project->cover_img_file ? asset(getFile($project->cover_img_file)) : asset('storage/base/base_logo.jpg') }}"
                                         style="width:9rem; height:9rem; object-fit: cover;" alt="Card image cap">

                                </div>
                                <div class="card-body text-dark">
                                    <div class="row">
                                        <h5 class="card-title text-left text-truncate col-10">
                                            @if($project->genre) [{{ $project->genre }}] @endif {{ $project->title }}
                                        </h5>
                                        <div style="font-size: 0.7rem">{{ $project->created_at }}</div>
                                    </div>
                                        <div class="card-text">
                                            by {{ $project->user->name }}
                                        </div>

                                    <table class="table table-striped table-sm mt-3 text-center"
                                           style="margin-bottom: 0rem;">
                                        <thead>
                                        <tr>
                                            <th scope="col">작곡</th>
                                            <th scope="col">편곡</th>
                                            <th scope="col">작사</th>
                                            <th scope="col">보컬</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $project->has_composer ? 'O' : 'X' }}</td>
                                            <td>{{ $project->has_editor ? 'O' : 'X' }}</td>
                                            <td>{{ $project->has_lyricist ? 'O' : 'X' }}</td>
                                            <td>{{ $project->has_singer ? 'O' : 'X' }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                @endforelse
            </div>

        </div>
    </div>


@endsection