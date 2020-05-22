<h2>{{ $project->title }}</h2>
<div>조회수: {{ $project->views }}</div>
<div class="mt-3 project-describe-bg card bg-secondary" style="overflow-y: auto;">
    <div class="project-describe card-body bg-secondary text-light">
        {{ $project->description }}
    </div>
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
</div>
