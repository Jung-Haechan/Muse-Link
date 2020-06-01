@extends('layouts.app')

@section('jumbotron')

@endsection

@section('content')

    <div class="col-md-7 p-5 mx-auto"
         style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">
        <form action="{{ route('user.exhibit.update', [$user->id, 'singer', $exhibit->id]) }}" method="post" enctype="multipart/form-data" style="">
            @csrf
            @method('put')
            <input type="hidden" name="role" value="singer">
            <div class="form-row">
                <div class="form-group col-sm-8">
                    <label for="title">작품 제목</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $exhibit->title }}">
                    @error('title')
                    <div class="text-light" style="background: #721c2499">제목을 입력해 주세요.</div>
                    @enderror
                </div>
                <div class="form-group col-sm-4">
                    <label for="is_opened">공개 범위</label>
                    <select class="form-control" name="is_opened" id="is_opened">
                        <option value="0" {{ $exhibit->is_opened === 0 ? 'selected' : NULL }}>전체공개</option>
                        <option value="1" {{ $exhibit->is_opened === 1 ? 'selected' : NULL }}>회원공개</option>
                        <option value="2" {{ $exhibit->is_opened === 2 ? 'selected' : NULL }}>팔로워공개</option>
                        <option value="3" {{ $exhibit->is_opened === 3 ? 'selected' : NULL }}>비공개</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="description">작품 설명</label>
                <textarea type="text" class="form-control" id="description" name="description"
                          placeholder="노래 설명" cols="30" rows="10">{{ $exhibit->description }}</textarea>
                @error('description')
                <div class="text-light" style="background: #721c2499">작품 설명을 입력해 주세요.</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="audio_file">오디오 파일</label>
                <input type="file" name="audio_file" id="audio_file"
                       class="form-control-file btn btn-outline-light btn-sm">
                @error('audio_file')
                <div class="text-light" style="background: #721c2499">오디오 파일 형식이 맞지 않습니다.</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="youtube_url">유튜브 URL</label>
                <input type="text" class="form-control" id="youtube_url" name="youtube_url" value="{{ $exhibit->youtube_url }}">
                @error('youtube_url')
                <div class="text-light" style="background: #721c2499">URL 형식이 아닙니다.</div>
                @enderror
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-outline-light btn-lg">작품 수정</button>
            </div>
        </form>
    </div>
@endsection
