@extends('layouts.app')

@section('jumbotron')

    <div class="text-center">
        <h3 class="font-weight-bold mb-3 section-subtitle" style="color: #d2ab39;">
            Producer
        </h3>
    </div>
    <h1 class="text-center text-light">
        <div class="display-1 section-title"><a href="{{ route('user.show', ['producer', $user->id]) }}"
                                                class="text-light text-decoration-none">{{ $user->name }}</a>
        </div>
    </h1>


@endsection

@section('content')
    <div class="container py-2"
         style="background-color: #4e555b; margin-top: 50px; min-height: 1000px; opacity: 0.9;">
        <div class="text-light">
            {{ $user->producer_exhibit->title }}
        </div>
        @forelse($user->exhibits as $exhibit)
            @if(isFaceExhibit($user, $exhibit, 'producer'))
                @continue
            @endif
            <div>
                {{ $exhibit->title }}
            </div>
        @empty
        @endforelse
    </div>
@endsection
