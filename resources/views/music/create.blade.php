@extends('layouts.app')

@section('jumbotron')

@endsection

@section('content')

    <div class="col-md-7 p-5 mx-auto"
         style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">

        <form action="{{ route('music.store') }}" method="post" enctype="multipart/form-data" style="">
            @csrf
            <div class="form-row">
                <div class="form-group col-sm-8">
                    <label for="title">제목</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="제목">
                </div>
                <div class="form-group col-sm-4">
                    <label for="genre">장르</label>
                    <input type="text" class="form-control" id="genre" name="genre" placeholder="장르">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group pr-2 col-4">
                    <label for="audio_file">오디오 파일</label>
                    <input type="file" name="audio_file" id="audio_file"
                           class="form-control-file btn btn-outline-light btn-sm">
                </div>
                <div class="form-group col-8">
                    <label for="youtube_url">유튜브 Url</label>
                    <input type="text" class="form-control" name="youtube_url" id="youtube_url"  placeholder="유튜브 Url">
                </div>
            </div>
            <div class="form-group">
                <label for="cover_img_file">커버 이미지</label>
                <input type="file" name="cover_img_file" id="cover_img_file"
                       class="form-control-file btn btn-outline-light btn-sm">
            </div>
            <div class="form-group">
                <label for="description">노래 설명</label>
                <textarea type="text" class="form-control" id="description" name="description"
                          placeholder="노래 설명" cols="30" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="lyrics">가사</label>
                <textarea type="text" class="form-control" id="lyrics" name="lyrics"
                          placeholder="가사" cols="30" rows="10"></textarea>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-3">
                    <label for="composer">작곡가</label>
                    <input type="text" class="form-control" id="composer" name="composer" placeholder="작곡가">
                </div>
                <div class="form-group col-sm-3">
                    <label for="editor">편곡자</label>
                    <input type="text" class="form-control" id="editor" name="editor" placeholder="편곡자">
                </div>
                <div class="form-group col-sm-3">
                    <label for="lyricist">작사가</label>
                    <input type="text" class="form-control" id="lyricist" name="lyricist" placeholder="작사가">
                </div>
                <div class="form-group col-sm-3">
                    <label for="singer">보컬</label>
                    <input type="text" class="form-control" id="singer" name="singer" placeholder="보컬">
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-outline-light btn-lg">업로드</button>
            </div>
        </form>
    </div>

@endsection
