<h2>{{ $project->title }}</h2>
<div>조회수: {{ $project->views }}</div>
<div class="mt-3 project-describe-bg card bg-secondary" style="overflow-y: auto;">
    <div class="project-describe card-body bg-secondary text-light">
        {{ $project->description }}
    </div>
</div>
