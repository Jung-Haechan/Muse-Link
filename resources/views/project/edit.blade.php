@extends('layouts.app')

@section('jumbotron')

@endsection

@section('content')

    <div class="col-md-7 p-5 mx-auto"
         style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9; color: #d6d8db">

        <form action="{{ route('project.update', $project->id) }}" method="post" enctype="multipart/form-data" style="">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">프로젝트 제목</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $project->title }}">
                @error('title')
                <div class="text-light" style="background: #721c2499">제목을 입력해 주세요.</div>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="genre">장르</label>
                    <input type="text" class="form-control" id="genre" name="genre" value="{{ $project->genre }}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="is_opened">공개 범위</label>
                    <select class="form-control" name="is_opened" id="is_opened">
                        <option value="0" {{ $project->is_opened === 0 ? 'selected' : '' }}>전체공개</option>
                        <option value="1" {{ $project->is_opened === 1 ? 'selected' : '' }}>회원공개</option>
                        <option value="2" {{ $project->is_opened === 2 ? 'selected' : '' }}>팔로워공개</option>
                        <option value="3" {{ $project->is_opened === 3 ? 'selected' : '' }}>협업자공개</option>
                        <option value="4" {{ $project->is_opened === 4 ? 'selected' : '' }}>비공개</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="cover_img_file">커버 이미지</label>
                <input type="file" name="cover_img_file" id="cover_img_file"
                       class="form-control-file btn btn-outline-light btn-sm">
                @error('cover_img_file')
                <div class="text-light" style="background: #721c2499">이미지 파일 형식이 맞지 않습니다.</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">프로젝트 설명</label>
                <textarea type="text" class="form-control" id="description" name="description"
                          placeholder="노래 설명" cols="30" rows="10">{{ $project->description }}</textarea>
                @error('description')
                <div class="text-light" style="background: #721c2499">프로젝트 설명을 입력해 주세요.</div>
                @enderror
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-outline-light btn-lg">프로젝트 수정</button>
            </div>
        </form>
    </div>

@endsection
