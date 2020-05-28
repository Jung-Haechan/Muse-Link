<div class="bg-secondary text-light p-3" style="height: 100%">
    <div>
        팔로워 {{ $followers_number }}명
        <span style="float:right">
            <a class="text-light" href="{{ route('user.follow.index', [$user->id, 'follower']) }}">
                +
            </a>
        </span>
    </div>
    @forelse($followers as $follower)
        <a href="{{ route('user.show', ['producer', $follower->user_id]) }}" class="text-decoration-none">
            <div class="bg-light p-1 my-1 text-dark">
                <span>
                    <img src="{{ getFile($follower->user->profile_img) }}" alt="" style="width: 3rem;">
                </span>
                <span class="ml-2">
                    {{ $follower->user->name }}
                </span>
            </div>
        </a>
    @empty
        <div>
            팔로워 없음
        </div>
    @endforelse
</div>
