<div class="row mt-3 mx-auto">
    @if($user->id !== Auth::id())
        <follow
            already-followed="{{ json_encode($already_followed) }}"
            followee-id="{{ $user->id }}"
            is-logged-in="{{ json_encode(Auth::check()) }}"
        ></follow>
    @endif
        <a href="{{ route('user.message.show', $user->id) }}"
           class="btn btn-primary float-right ml-2 text-light"
           onclick="window.open(this.href, '_blank', 'toolbars=no'); return false;">
            메시지
        </a>
</div>

