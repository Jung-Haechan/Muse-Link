@extends('layouts.app')

@section('css')
    <style>
        .table td:nth-child(1) {
            width: 15%;
        }

        .table td:nth-child(2) {
            width: 60%;
            white-space: normal;
        }

        .table td:nth-child(3) {
            width: 15%;
        }

        .table td:nth-child(4) {
            width: 10%;
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

@section('jumbotron')
    <div class="text-center">
        <h3 class="font-weight-bold mb-3 section-subtitle" style="color: #d2ab39;">알려드립니다!</h3>
    </div>
    <h1 class="text-center text-light">
        <div class="display-1 section-title"><a href="{{ route('notice.index') }}"
                                                class="text-light text-decoration-none">Notice</a>
        </div>
    </h1>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-11 p-5 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; opacity: 0.9;">
            <table class="table table-light table-condensed table-striped" style="font-size:14px;">
                <thead class="bg-dark text-light">
                <tr>
                    <td class="mobile-hide">번호</td>
                    <td>공지</td>
                    <td class="mobile-hide">날짜</td>
                    <td class="mobile-hide">조회수</td>
                </tr>
                </thead>
                <tbody>
                @foreach($notices as $notice)
                    <tr>
                        <td class="mobile-hide">{{$notice->id}}</td>
                        <td>
                            <div>
                                <a href="{{route('notice.show', $notice->id)}}" class="text-dark">
                                    {{ $notice->title }}
                                </a>
                            </div>
                            <div class="desktop-hide" style="font-size: 11px;">
                                <span class="desktop-hide pr-3">날짜: {{ getTime($notice->created_at) }}</span>
                                <span class="desktop-hide pr-3">조회수: {{ $notice->views }} </span>
                            </div>
                        </td>
                        <td class="mobile-hide">{{ getTime($notice->created_at) }}</td>
                        <td class="mobile-hide">{{ $notice->views }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                @if($notices)
                    <div class="col-8">
                        {{ $notices->links() }}
                    </div>
                @endif
                @if(isAdmin(Auth::user()))
                    <div class="col-4 text-right">
                        <a href="{{ route('notice.create') }}" class="btn btn-light">글쓰기</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
