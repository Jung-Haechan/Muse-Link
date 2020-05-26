<div class="row mt-2 mx-auto">
    @foreach(config('translate.role') as $role_eng => $role_kor)
        <div style="display: inline">
            @if($collaboratorStatus[$role_eng] === NULL)
                <form class="form-inline"
                      action="{{ route('project.collaborator.store', $project->id) }}"
                      method="post">
                    @csrf
                    <input type="hidden" name="role" value="{{ $role_eng }}">
                    <button
                        type="{{ $collaboratorStatus[$role_eng] === NULL ? 'submit' : NULL }}"
                        class="mr-2 btn btn-outline-{{ getRoleColor($role_eng) }} font-weight-bold bg-light">
                        {{ $role_kor }} 신청
                    </button>
                </form>
            @elseif($collaboratorStatus[$role_eng] === 0)
                <a href="#"
                   class="mr-2 btn btn-outline-{{ getRoleColor($role_eng) }} font-weight-bold bg-light">
                    {{ $role_kor }} 신청 취소
                </a>
            @elseif($collaboratorStatus[$role_eng] === 1)
                <a href="{{ route('project.version.create', [$project->id, $role_eng]) }}"
                   class="mr-2 btn btn-outline-{{ getRoleColor($role_eng) }} font-weight-bold bg-light">
                    {{ $role_kor }} 등록
                </a>
            @else
                <a href="#"
                   class="mr-2 btn btn-outline-{{ getRoleColor($role_eng) }} font-weight-bold bg-light disabled"
                   disabled="true">
                    {{ $role_kor }} 신청 거부당함
                </a>
            @endif
        </div>
        @if($role_eng === 'singer')
            @break
        @endif
    @endforeach
    @inject('AuthTrait', 'App\Traits\TraitsForView\AuthTraitForView')
    @if($AuthTrait->isProjectAdmin(Auth::user(), $project))
        <a href="{{ route('project.collaborator.index', $project->id) }}"
           class="btn mr-2 btn-outline-dark bg-light font-weight-bold">참여자 관리</a>
        <form action="{{ route('project.update_complete', $project->id) }}" method="post">
            @csrf
            @method('put')
            <button type="submit" class="btn btn-outline-warning bg-light font-weight-bold">완료</button>
        </form>
    @endif
</div>
