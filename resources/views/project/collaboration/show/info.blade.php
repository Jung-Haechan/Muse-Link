<h2>
    <a class="text-dark" href="{{ route('project.show', [$board, $project->id]) }}">
        {{ $project->title }}
    </a>
</h2>
<div class="row">
    <div class="col-6">
        조회수: {{ $project->views }}
    </div>
    <div class="col-6 text-right">
        by <a class="text-dark" href="{{ route('user.show', ['producer', $project->user->id]) }}">
            {{ $project->user->name }}
        </a>
    </div>
</div>
<div class="mt-3 project-describe-bg card bg-secondary" style="overflow-y: auto;">
    <div class="project-describe card-body bg-secondary text-light">
        {{ $project->description }}
    </div>
    @if(isProjectAdmin(Auth::user(), $project))
        <div class="p-3 text-right">
            <form action="{{ route('project.delete', $project->id) }}" method="post" style="display: inline">
                @csrf
                @method('delete')
                <button class="btn btn-light">
                    삭제
                </button>
            </form>
            <a href="{{ route('project.edit', $project->id) }}" class="btn btn-light">
                수정
            </a>
        </div>
    @endif
</div>
