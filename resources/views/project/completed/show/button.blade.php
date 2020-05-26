<div class="row mt-3 mx-auto">
    <like
        icon-dir="{{ asset('storage/icon/like.png') }}"
        project-id="{{ $project->id }}"
        is-logged-in="{{ json_encode(Auth::check()) }}"
        likes="{{ json_encode($project->likes) }}"
        already-like="{{ json_encode($project->already_like) }}"
    ></like>
</div>
