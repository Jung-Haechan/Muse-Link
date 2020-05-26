<div class="row mt-3 mx-auto">
    <follow
        already-followed="{{ $already_followed }}"
        followee-id="{{ $user->id }}"
        is-logged-in="{{ Auth::check() }}"
    ></follow>
</div>

