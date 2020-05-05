@extends('layouts.app')

@section('jumbotron')
    <div class="text-center">
        <h3 class="section-subtitle font-weight-bold mb-3" style="color: #d2ab39;">당신의 미완성 프로젝트를 공유하세요!</h3>
    </div>
    <div class="section-title text-center text-light display-3">
        <a href="http://127.0.0.1:8000/music/collaboration"
           class="text-light text-decoration-none">Collaboration</a>
    </div>
    <a href="{{ route('music.create') }}" class="btn btn-outline-light mt-3" style="font-size: 1.2rem">프로젝트 만들기</a>
@endsection

@section('content')


    <div class="container">
        <div class="col-md-11 p-5 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">
            <div class="row">
                @forelse($musics as $music)
                    <div class="col-lg-4 mb-3">
                        <a class="text-decoration-none" href="{{ route('music.show', ['collaboration', $music->id]) }}">
                            <div class="card card-music container">
                                <div class="row text-dark bg-dark" style="height: 9rem;">

                                    <img class="card-img-top mb-3 mx-auto"
                                         src="{{ $music->cover_img_file ? asset(getFile($music->cover_img_file)) : asset('storage/base/base_logo.jpg') }}"
                                         style="width:9rem; height:9rem; object-fit: cover;" alt="Card image cap">

                                </div>
                                <div class="card-body text-dark">
                                    <div class="row">
                                        <h5 class="card-title text-left text-truncate col-10">
                                            @if($music->genre) [{{ $music->genre }}] @endif {{ $music->title }}
                                        </h5>
                                        <div style="font-size: 0.7rem">{{ $music->user->name }}</div>
                                    </div>
                                        <div class="card-text">
                                            by {{ $music->user->name }}
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
                                            <td>{{ $music->composer ? 'O' : 'X' }}</td>
                                            <td>{{ $music->editor ? 'O' : 'X' }}</td>
                                            <td>{{ $music->lyricist ? 'O' : 'X' }}</td>
                                            <td>{{ $music->singer ? 'O' : 'X' }}</td>
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
