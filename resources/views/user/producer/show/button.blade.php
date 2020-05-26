<div class="row mt-3 mx-auto">
    <follow
        already-followed="{{ json_encode($already_followed) }}"
        followee-id="{{ $user->id }}"
        is-logged-in="{{ json_encode(Auth::check()) }}"
    ></follow>
</div>

