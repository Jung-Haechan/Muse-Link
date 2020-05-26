<div class="row mb-4">
    <div class="col-md-3">
        <div class="bg-secondary text-center p-2">
            <img src="{{ getFile($user->profile_img) }}" style="width: 7rem;">
            <div class="text-light">{{ $user->name }}</div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="text-light bg-secondary p-3" style="height:100%">
            {{ $user->introduce }}
        </div>
    </div>
</div>
