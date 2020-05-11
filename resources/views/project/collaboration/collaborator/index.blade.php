@extends('layouts.app')

@section('jumbotron')

@endsection

@section('content')
    <div class="container col-md-10 p-5 mx-auto text-dark"
         style="background-color: #b9bbbe;  min-height: 1000px; opacity: 0.93; color: #d6d8db">
        <div class="row">
            <div class="col-lg-8">
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
                                <div class="container">
                                    <div class="row">
                                        <form class="form-inline"
                                              action="{{ route('project.collaborator.update', [$project->id, $collaborator->id]) }}"
                                              method="post">
                                            <input type="hidden" name="role" value="{{ $collaborator->role }}">
                                            <input type="hidden" name="is_approved" value="1">
                                            <button type="submit" class="btn btn btn-info btn-sm mr-2">승인</button>
                                        </form>
                                        <form class="form-inline"
                                              action="{{ route('project.collaborator.update', [$project->id, $collaborator->id]) }}"
                                              method="post">
                                            <input type="hidden" name="role" value="{{ $collaborator->role }}">
                                            <input type="hidden" name="is_approved" value="2">
                                            <button type="submit" class="btn btn btn-danger btn-sm">거절</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </table>

            </div>
            <div class="col-4">
                @foreach(config('translate.role') as $role_eng => $role_kor)
                    <form action="{{ route('project.update_status', $project) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="role" value="{{ $role_eng }}">
                        <button type="submit" class="btn btn btn-outline-dark bg-light mb-1">{{ $role_kor }}
                            모집 {{ $project['has_'.$role_eng] ? '개방하기' : '마감하기' }}</button>
                    </form>
                @endforeach
            </div>
        </div>


@endsection
