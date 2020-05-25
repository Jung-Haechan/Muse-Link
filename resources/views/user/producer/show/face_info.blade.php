<h2>{{ $face_exhibit->title }}</h2>
<div class="mt-3 project-describe-bg card bg-secondary" style="overflow-y: auto; height:21rem">
    <div class="card-body bg-secondary text-light">
        {{ $face_exhibit->description }}
    </div>
{{--    @if(isProjectAdmin(Auth::user(), $project))--}}
{{--        <div class="p-3 text-right">--}}
{{--            <form action="{{ route('project.delete', $project->id) }}" method="post" style="display: inline">--}}
{{--                @csrf--}}
{{--                @method('delete')--}}
{{--                <button class="btn btn-light">--}}
{{--                    삭제--}}
{{--                </button>--}}
{{--            </form>--}}
{{--            <a href="{{ route('project.edit', $project->id) }}" class="btn btn-light">--}}
{{--                수정--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    @endif--}}
</div>
