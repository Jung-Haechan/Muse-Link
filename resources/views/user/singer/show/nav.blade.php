<nav class="row">
    <div class="col-6 pt-2 {{ $board === 'producer' ? '' : 'bg-dark' }}">
        <a class="text-decoration-none {{ $board === 'producer' ? 'text-dark' : 'text-secondary' }}" href="{{ route('user.show', ['producer', $user->id]) }}">
            <h4 class="text-center">
                프로듀서 채널
            </h4>
        </a>
    </div>
    <div class="col-6 pt-2 {{ $board === 'singer' ? '' : 'bg-dark' }}">
        <a class="text-decoration-none {{ $board === 'singer' ? 'text-dark' : 'text-secondary' }}" href="{{ route('user.show', ['singer', $user->id]) }}">
            <h4 class="text-center">
                가수 채널
            </h4>
        </a>
    </div>
</nav>
