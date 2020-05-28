@extends('layouts.app')

@section('jumbotron')

@endsection

@section('content')
    <div class="col-md-7 p-5 mx-auto"
         style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">
        <form action="{{ route('user.exhibit.store', [$user->id, 'producer']) }}" method="post" enctype="multipart/form-data" style="">
            @csrf
            <input type="hidden" name="role" value="singer">
            <div class="form-row">
                <div class="form-group col-sm-8">
                    <label for="title">작품 제목</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="제목">
                    @error('title')
                    <div class="text-light" style="background: #721c2499">제목을 입력해 주세요.</div>
                    @enderror
                </div>
                <div class="form-group col-sm-4">
                    <label for="is_opened">공개 범위</label>
                    <select class="form-control" name="is_opened" id="is_opened">
                        <option value="0">전체공개</option>
                        <option value="1">회원공개</option>
                        <option value="2">팔로워공개</option>
                        <option value="3">비공개</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="description">작품 설명</label>
                <textarea type="text" class="form-control" id="description" name="description"
                          placeholder="노래 설명" cols="30" rows="10"></textarea>
                @error('description')
                <div class="text-light" style="background: #721c2499">작품 설명을 입력해 주세요.</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="audio_file">오디오 파일</label>
                <input type="file" name="audio_file" id="audio_file"
                       class="form-control-file btn btn-outline-light btn-sm">
            </div>
            <div class="form-group">
                <label for="youtube_url">유튜브 URL</label>
                <input type="text" class="form-control" id="youtube_url" name="youtube_url" placeholder="유튜브 URL">
                @error('youtube_url')
                <div class="text-light" style="background: #721c2499">URL 형식이 아닙니다.</div>
                @enderror
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-outline-light btn-lg">작품 생성</button>
            </div>
        </form>
    </div>
@endsection
