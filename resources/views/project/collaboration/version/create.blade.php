@extends('layouts.app')

@section('jumbotron')

@endsection

@section('content')

    <div class="col-md-7 p-5 mx-auto"
         style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">

        <form action="{{ route('project.version.store', [$project->id, $role]) }}" method="post" enctype="multipart/form-data"
              style="">
            @csrf
            <input type="hidden" name="role" value="{{ $role }}">
            <div class="form-group">
                <label for="title">버전 제목</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="제목">
            </div>
            @if ($role !== 'lyricist')
                <div class="form-group">
                    <label for="project_audio_file">프로젝트 파일</label>
                    <input type="file" name="project_audio_file" id="project_audio_file"
                           class="form-control-file btn btn-outline-light btn-sm">
                </div>
                @if ($role === 'singer')
                    <div class="form-group">
                        <label for="voice_audio_file">목소리 파일</label>
                        <input type="file" name="voice_audio_file" id="voice_audio_file"
                               class="form-control-file btn btn-outline-light btn-sm">
                    </div>
                @endif
            @endif
            @if ($role === 'lyricist')
                <div class="form-group">
                    <label for="lyrics">가사</label>
                    <textarea type="text" class="form-control" id="lyrics" name="lyrics"
                              placeholder="노래 설명" cols="30" rows="15"></textarea>
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
