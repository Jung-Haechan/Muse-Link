@extends('layouts.app')

@section('jumbotron.comment', '메신저로 당신의 의견을 전달하세요!')
@section('jumbotron.url', route('user.index', 'producer'))
@section('jumbotron.page', 'Messenger')

@section('content')
    <div class="container">
        <div class="col-md-11 p-3 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; opacity: 0.9; color: #d6d8db">
            @forelse($opponents as $opponent)
                <a href="{{ route('user.message.show', $opponent->id) }}"
                   class="text-dark text-decoration-none"
                   onclick="window.open(this.href, '_blank', 'toolbars=no'); return false;">
                    <div class="row p-2 m-2 bg-light" style="font-size: 0.9rem">
                        <div class="col-1 px-2">
                            <img src="{{ asset($opponent->profile_img) }}" style="width: 4rem" alt="">
                        </div>
                        <div class="col-3 text-center">
                            <div>
                                {{ $opponent->name }}
                            </div>
                            <div class="mt-2">
                                <span
                                    class="bg-dark text-light p-1">{{ getTime($opponent->messagesWith()->first()->created_at) }}</span>
                            </div>
                        </div>

                        <div class="col-5">
                            @if($opponent->messagesWith()->first()->sender_id === $opponent->user && !$opponent->messagesWith()->first()->is_read)
                                <span class="text-danger">[New]</span>
                            @endif
                            {{ $opponent->messagesWith()->first()->content }}
                        </div>
                        <div class="col-1">
                            <img src="{{ getFile('storage/icon/gender-'.$opponent->gender.'.jpg') }}"
                                 style="width:3rem;"
                                 alt="">
                        </div>
                        <div class="col-2 text-right">
                            <form action="">
                                <button class="btn-danger btn btn-sm">대화 삭제</button>
                            </form>
                        </div>
                    </div>
                </a>
            @empty
            @endforelse
            <div class="m-3">
                {{ $opponents->links() }}
            </div>
        </div>
    </div>


@endsection
