<h2>{{ $face_exhibit ? $face_exhibit->title : '대표작 없음' }}</h2>
<div class="mt-3 project-describe-bg card bg-secondary" style="overflow-y: auto; height:21rem">
    <div class="card-body bg-secondary text-light">
        {{ $face_exhibit ? $face_exhibit->description : '대표작 없음' }}
    </div>
</div>
