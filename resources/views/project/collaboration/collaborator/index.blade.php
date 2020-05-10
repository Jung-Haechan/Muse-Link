@extends('layouts.app')

@section('jumbotron')
    <div class="text-center">
        <h3 class="section-subtitle font-weight-bold mb-3" style="color: #d2ab39;">당신의 미완성 프로젝트를 공유하세요!</h3>
    </div>
    <div class="section-title text-center text-light display-3">
        <a href="{{ route('project.index', 'collaboration') }}"
           class="text-light text-decoration-none">Collaboration</a>
    </div>
    <a href="{{ route('project.create') }}" class="btn btn-outline-light mt-3" style="font-size: 1.2rem">프로젝트 만들기</a>
@endsection

@section('content')
    @foreach(config('translate.role') as $role_eng => $role_kor)
        <form action="{{ route('project.update_status', $project) }}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="role" value="{{ $role_eng }}">
            <button type="submit">{{ $role_kor }} 모집 {{ $project['has_'.$role_eng] ? '개방하기' : '마감하기' }}</button>
        </form>
    @endforeach
        <table class="table table-light">
            <thead>
                <tr>
                    <th>이름</th>
                    <th>역할</th>
                    <th>승인 상태</th>
                </tr>
            </thead>
            <tbody>
            @forelse($collaborators as $collaborator)
                <tr>
                    <td>{{ $collaborator->user->name }}</td>
                    <td>{{ $collaborator->role }}</td>
                    <td>
                        @if($collaborator->is_approved === 0)
                            미승인
                        @elseif($collaborator->is_approved === 1)
                            승인 완료
                        @elseif($collaborator->is_approved === 2)
                            승인 거부
                        @endif
                    </td>
                    <td>
                        <form class="form-inline" action="{{ route('project.collaborator.update', [$project->id, $collaborator->id]) }}" method="post">
                            <input type="hidden" name="role" value="{{ $collaborator->role }}">
                            <input type="hidden" name="is_approved" value="1">
                            <button type="submit">승인하기</button>
                        </form>
                        <form class="form-inline" action="{{ route('project.collaborator.update', [$project->id, $collaborator->id]) }}" method="post">
                            <input type="hidden" name="role" value="{{ $collaborator->role }}">
                            <input type="hidden" name="is_approved" value="2">
                            <button type="submit">승인거부</button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse
        </table>

@endsection
