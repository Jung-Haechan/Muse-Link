<div class="row mt-2 mx-auto">
    <div style="display: inline">
        <follow
            already-followed="{{ $already_followed }}"
            followee-id="{{ $user->id }}"
            is-logged-in="{{ Auth::check() }}"
        ></follow>
    </div>
</div>

