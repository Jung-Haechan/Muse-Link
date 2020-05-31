@extends('layouts.app')

@section('jumbotron.comment', '메신저로 당신의 의견을 전달하세요!')
@section('jumbotron.url', route('user.message.index'))
@section('jumbotron.page', 'Messenger')

@section('content')
    <div class="container">
        <div class="col-md-11 p-3 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; opacity: 0.9;">
            @forelse($opponents as $opponent)

                <div class="row p-2 m-2 bg-light" style="font-size: 0.9rem">
                    <div class="col-1 px-2">
                        <img src="{{ asset($opponent->profile_img) }}" style="width: 4rem" alt="">
                    </div>
                    <div class="col-3 text-center">
                        <div>
                            <a class="text-dark text-decoration-none"
                               href="{{ route('user.show', [$opponent->is_producer ? 'producer' : 'singer', $opponent->id]) }}">
                                {{ $opponent->name }}
                            </a>
                        </div>
                        <div class="mt-2">
                                <span
                                    class="bg-dark text-light p-1">{{ getTime($opponent->messagesWith()->first()->created_at) }}</span>
                        </div>
                    </div>
                    <div class="col-5">
                        <a href="{{ route('user.message.show', $opponent->id) }}"
                           class="text-dark text-decoration-none"
                           onclick="window.open(this.href, '_blank', 'toolbars=no'); return false;">
                            @if($opponent->messagesWith()->first()->sender_id === $opponent->user && !$opponent->messagesWith()->first()->is_read)
                                <span class="text-danger">[New]</span>
                            @endif
                            {{ $opponent->messagesWith()->first()->content }}
                        </a>
                    </div>
                    <div class="col-1">
                        <img src="{{ getFile('storage/icon/gender-'.$opponent->gender.'.jpg') }}"
                             style="width:3rem;"
                             alt="">
                    </div>
                    <div class="col-2 text-right">
                        <form action="{{ route('user.message.delete_opponent', $opponent->id) }}" method="post">
                            @csrf
                            @method('put')
                            <button class="btn-danger btn btn-sm">대화 삭제</button>
                        </form>
                    </div>
                </div>
                </a>
            @empty
                <div class="text-center text-light">대화 상대가 없습니다.</div>
            @endforelse
            <div class="m-3">
                {{ $opponents->links() }}
            </div>
        </div>
    </div>


@endsection
