@extends('layouts.app')

@section('jumbotron')

@endsection

@section('content')

    <div class="col-md-7 p-5 mx-auto"
         style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">

        <form action="{{ route('project.version.store', [$project->id, $role]) }}" method="post"
              enctype="multipart/form-data"
              style="">
            @csrf
            <input type="hidden" name="role" value="{{ $role }}">
            <div class="form-row">
                <div class="form-group col-sm-8">
                    <label for="title">버전 제목</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="제목">
                    @error('title')
                    <div class="text-light" style="background: #721c2499">버전 제목을 입력해 주세요.</div>
                    @enderror
                </div>
                <div class="form-group col-sm-4">
                    <label for="is_opened">공개 범위</label>
                    <select class="form-control" name="is_opened" id="is_opened">
                        <option value="0">전체공개</option>
                        <option value="1">회원공개</option>
                        <option value="2">팔로워공개</option>
                        <option value="3">협업자공개</option>
                        <option value="4">비공개</option>
                    </select>
                </div>
            </div>

            @if ($role !== 'lyricist')
                <div class="form-group">
                    <label for="project_audio_file">프로젝트 파일 @if($role !== 'singer') (가이드 녹음) @endif </label>
                    <input type="file" name="project_audio_file" id="project_audio_file"
                           class="form-control-file btn btn-outline-light btn-sm">
                    @error('project_audio_file')
                    <div class="text-light" style="background: #721c2499">프로젝트 오디오 파일이 필요합니다.</div>
                    @enderror
                </div>
                @if ($role === 'composer' || $role === 'editor')
                    <div class="form-group">
                        <label for="mr_audio_file">MR 파일</label>
                        <input type="file" name="mr_audio_file" id="mr_audio_file"
                               class="form-control-file btn btn-outline-light btn-sm">
                        @error('mr_audio_file')
                        <div class="text-light" style="background: #721c2499">오디오 파일 형식이 맞지 않습니다.</div>
                        @enderror
                    </div>
                @endif
                @if ($role === 'singer')
                    <div class="form-group">
                        <label for="voice_audio_file">목소리 파일</label>
                        <input type="file" name="voice_audio_file" id="voice_audio_file"
                               class="form-control-file btn btn-outline-light btn-sm">
                        @error('voice_audio_file')
                        <div class="text-light" style="background: #721c2499">오디오 파일 형식이 맞지 않습니다.</div>
                        @enderror
                    </div>
                @endif
            @endif
            @if ($role === 'lyricist')
                <div class="form-group">
                    <label for="lyrics">가사</label>
                    <textarea type="text" class="form-control" id="lyrics" name="lyrics"
                              placeholder="가사" cols="30" rows="15"></textarea>
                </div>
            @endif
            <div class="form-group">
                <label for="description">버전 설명</label>
                <textarea type="text" class="form-control" id="description" name="description"
                          placeholder="버전 설명" cols="30" rows="10"></textarea>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-outline-light btn-lg">업로드</button>
            </div>
        </form>
    </div>

@endsection
