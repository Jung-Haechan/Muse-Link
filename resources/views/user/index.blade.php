@extends('layouts.app')

@section('jumbotron')

    <div class="text-center">
        <h3 class="font-weight-bold mb-3 section-subtitle" style="color: #d2ab39;">
            당신과 협업할
            @if($board === 'producer')
                프로듀서를
            @elseif($board === 'singer')
                가수를
            @endif
            찾아보세요!
        </h3>
    </div>
    <h1 class="text-center text-light">
        <div class="display-1 section-title"><a href="http://127.0.0.1:8000/"
                                                class="text-light text-decoration-none">{{ $board }}s</a>
        </div>
    </h1>


@endsection

@section('content')
    <div class="container">
        @forelse($users as $user)
            <div class="text-light">
                {{ $user->name }}
            </div>
        @empty
        @endforelse
    </div>
@endsection
