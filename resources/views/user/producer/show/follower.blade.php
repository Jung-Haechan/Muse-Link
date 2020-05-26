<div class="bg-secondary text-light p-3" style="height: 100%">
    <div>팔로워 {{ $followers->count() }}명</div>
            @forelse($followers as $follower)
                <div class="bg-light p-1 m-1 text-dark">
                    <span>
                        <img src="{{ getFile($follower->user->profile_img) }}" alt="" style="width: 3rem;">
                    </span>
                    <span class="ml-2">
                        {{ $follower->user->name }}
                    </span>
                </div>
            @empty
                <div>
                    팔로워 없음
                </div>
            @endforelse
        </div>
</div>
