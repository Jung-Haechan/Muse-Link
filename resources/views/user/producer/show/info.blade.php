<div class="row mb-4">
    <div class="col-md-3">
        <div class="bg-secondary text-center p-2 h-100">
            <img src="{{ getFile($user->profile_img) }}" style="width: 7rem;">
            <div class="text-light">{{ $user->name }}</div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="text-light bg-secondary p-3 h-100">
            <div class="" style="min-height: 70%">
                {{ $user->introduce }}
            </div>
            @if($user->id === Auth::id())
                <div>
                    <a class="btn btn-outline-light text-light float-right my-2" href="{{ route('register') }}">내정보 수정</a>
                </div>
            @endif
        </div>
    </div>
</div>
