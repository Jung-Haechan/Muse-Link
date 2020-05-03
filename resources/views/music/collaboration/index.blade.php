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


    <div class="container">
        <div class="col-md-11 p-5 mx-auto"
             style="background-color: #4e555b; margin-top: 100px; min-height: 1000px; opacity: 0.9; color: #d6d8db">
            <div class="row">
                @forelse($musics as $music)
                    <div class="col-lg-4">
                        <a class="text-decoration-none" href="{{ route('music.show', ['collaboration', $music->id]) }}">
                            <div class="card container">
                                <div class="row text-dark bg-dark" style="height: 150px;">
                                    <img class="card-img-top mb-3 col-7 mx-auto"
                                         src="{{ $music->cover_img_file ? asset(getFile($music->cover_img_file)) : asset('storage/base/base_logo.jpg') }}"
                                         style=" height: 150px; object-fit: cover;" alt="Card image cap">
                                </div>
                                <div class="card-body text-dark">
                                    <h5 class="card-title">
                                        @if($music->genre) [{{ $music->genre }}] @endif {{ $music->title }}
                                    </h5>
                                    <div class="card-text">
                                        by {{ $music->user->name }}
                                    </div>
                                    <table class="table table-striped table-sm mt-3 text-center">
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
