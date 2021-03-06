@extends('layouts.app')

@section('css')
    <style>
        .table td:nth-child(1) {
            width: 12.5%;
        }

        .table td:nth-child(2) {
            width: 47.5%;
            white-space: normal;
        }

        .table td:nth-child(3) {
            width: 15%;
        }

        .table td:nth-child(4) {
            width: 15%;
        }

        .table td:nth-child(5) {
            width: 7.5%;
            text-align: center;
        }

        .table td:nth-child(6) {
            width: 7.5%;
            text-align: center;
        }

        .desktop-hide {
            display: none;
        }

        @media (max-width: 992px) {
            .desktop-hide {
                display: inherit;
            }

            .mobile-hide {
                display: none;
            }
        }


    </style>
@endsection

@include('post.jumbotron')

@section('content')
    <div class="container">
        <div class="col-md-11 p-5 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; opacity: 0.9; color: #d6d8db">
            <table class="table table-light table-condensed table-striped mt-2" style="font-size:14px;">
                <thead class="bg-dark text-light">
                <tr>
                    <td class="mobile-hide">번호</td>
                    <td>제목</td>
                    <td class="mobile-hide">글쓴이</td>
                    <td class="mobile-hide">날짜</td>
                    <td class="mobile-hide">조회수</td>
                    <td class="mobile-hide">추천수</td>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td class="mobile-hide">{{$post->id}}</td>
                        <td>
                            <div>
                                <a href="{{route('post.show', $post->id)}}" class="text-dark">
                                    {{$post['title']}}
                                    @if($post->replies()->first())
                                        <span class="text-danger">[{{ $post->replies()->count() }}]</span>
                                    @endif
                                </a>
                            </div>
                            <div class="desktop-hide" style="font-size: 11px;">
                                <span class="desktop-hide pr-3">글쓴이: {{ $post->user->name }}</span>
                                <span class="desktop-hide pr-3">날짜: {{ getTime($post->created_at) }}</span>
                                <span class="desktop-hide pr-3">조회수: {{ $post->views }} </span>
                                <span class="desktop-hide pr-3">추천수: {{ $post->likes_num }} </span>
                            </div>
                        </td>
                        <td class="mobile-hide">{{ $post->user->name }}</td>
                        <td class="mobile-hide">{{ getTime($post->created_at) }}</td>
                        <td class="mobile-hide">{{ $post->views }}</td>
                        <td class="mobile-hide">{{ $post->likes_num }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                @if($posts)
                    <div class="col-8">
                        {{ $posts->links() }}
                    </div>
                @endif
                <div class="col-4 text-right">
                    <a href="{{ route('post.create') }}" class="btn btn-light">글쓰기</a>
                </div>
            </div>
        </div>
    </div>


@endsection
