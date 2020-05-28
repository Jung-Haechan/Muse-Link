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
    <div class="col-md-7 p-5 mx-auto"
         style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">

        <form action="{{ route('notice.update', $notice->id) }}" method="post" enctype="multipart/form-data" style="">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">제목</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $notice->title }}">
                @error('title')
                <div class="text-light" style="background: #721c2499">제목을 입력해 주세요.</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">내용</label>
                <textarea type="text" class="form-control" id="content" name="content"
                          placeholder="내용" cols="30" rows="10">{{ $notice->content }}</textarea>
                @error('content')
                <div class="text-light" style="background: #721c2499">내용을 입력해 주세요.</div>
                @enderror
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-outline-light btn-lg">완료</button>
            </div>
        </form>
    </div>

@endsection
