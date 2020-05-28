@extends('layouts.app')

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
            <div class="col-md-10 mx-auto bg-light" style="border-radius:20px">
                <div class='p-3'><strong>
                        <a href="{{ route('notice.show', $notice->id) }}"
                           class="text-dark">공지: {{$notice->title}}</a>
                    </strong></div>
                <div class='row bg-dark text-light p-2 ' style="font-size:12px;">
                    <div class='col-4'>{{ getTime($notice->created_at) }}</div>
                    <div class='col-4'>조회수: {{ $notice->views }}</div>
                </div>
                <div class='p-3' style="min-height: 300px">
                    <div class="pb-3" style="white-space:pre-wrap;">{{$notice->content}}</div>
                </div>
                @if(isAdmin(Auth::user(), $notice))
                    <div class="row">
                        <form action="{{route('notice.delete',$notice->id)}}" method='post'>
                            <div class="form-group">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-dark ml-4" type='submit'>삭제</button>
                            </div>
                        </form>
                        <form action="{{route('notice.edit', $notice->id)}}" method='get'>
                            <div class="form-group">
                                <button class="btn btn-sm btn-dark ml-3" type='submit'>수정</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
            <div class="text-center pt-5">
                <a href="{{ route('notice.index') }}" class="btn-lg btn-light">목록으로</a>
            </div>
        </div>
    </div>
@endsection


