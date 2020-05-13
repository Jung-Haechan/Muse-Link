@extends('layouts.app')

@section('jumbotron')

@endsection

@section('content')
    <div class="container col-md-10 p-5 mx-auto text-dark"
         style="background-color: #b9bbbe;  min-height: 1000px; opacity: 0.93; color: #d6d8db">
        <div class="row">
            <div class="col-lg-9">
                <table class="table table-light table-hover">
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
                                @if($collaborator->user_id === Auth::id())
                                    프로젝트 개설
                                @elseif($collaborator->is_approved === 0)
                                    미승인
                                @elseif($collaborator->is_approved === 1)
                                    승인 완료
                                @elseif($collaborator->is_approved === 2)
                                    승인 거부
                                @elseif($collaborator->is_approved === 3)
                                    강제 탈퇴
                                @endif
                            </td>
                            <td>
                                <div class="container">
                                    <div class="row">
                                        @if($collaborator->is_approved === 0)
                                            <form class="form-inline"
                                                  action="{{ route('project.collaborator.update', [$project->id, $collaborator->id]) }}"
                                                  method="post">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="is_approved" value="1">
                                                <button type="submit" class="btn btn btn-info btn-sm mr-2">승인</button>
                                            </form>
                                            <form class="form-inline"
                                                  action="{{ route('project.collaborator.update', [$project->id, $collaborator->id]) }}"
                                                  method="post">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" name="role" value="{{ $collaborator->role }}">
                                                <button type="submit" class="btn btn btn-danger btn-sm">거절</button>
                                            </form>
                                        @elseif($collaborator->is_approved === 1)
                                            @if($project->user_id !== Auth::id())
                                                <form class="form-inline"
                                                      action="{{ route('project.collaborator.update', [$project->id, $collaborator->id]) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('put')
                                                    <input type="hidden" name="is_approved" value="3">
                                                    <button type="submit" class="btn btn btn-danger btn-sm">권한제거
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <form class="form-inline"
                                                  action="{{ route('project.collaborator.delete', [$project->id, $collaborator->id]) }}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn btn-danger btn-sm">강제탈퇴
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </table>

            </div>
            <div class="">
                @foreach(config('translate.role') as $role_eng => $role_kor)
                    <form action="{{ route('project.update_status', $project) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="role" value="{{ $role_eng }}">
                        <button type="submit" class="btn btn btn-outline-dark bg-light mb-1">{{ $role_kor }}
                            모집 {{ $project['has_'.$role_eng] ? '개방하기' : '마감하기' }}</button>
                    </form>
                    @if($role_eng === 'singer')
                        @break
                    @endif
                @endforeach
            </div>
        </div>
@endsection
