@extends('layouts.app')

@include('cs.qna.jumbotron')

@section('content')
    <div class="container">
        <div class="col-md-11 p-5 mx-auto"
             style="background-color: #4e555b; margin-top: 50px; opacity: 0.9;">
            <div class="accordion bg-secondary p-3 mt-3" id="qna">
                @forelse($qnas as $qna)
                    <div class="card">
                        <div class="card-header" id="heading{{ $qna->id }}">
                            <h2 class="mb-0">
                                <div
                                    class="text-decoration-none text-dark"
                                    type="button"
                                    data-toggle="collapse"
                                    data-target="#collapse{{ $qna->id }}"
                                    aria-expanded="true" aria-controls="collapse{{ $qna->id }}">
                                    <div style="font-size: 1.1rem;">
                                        {{ $qna->question }}
                                    </div>
                                </div>
                                <div class="container pt-2" style="font-size: 0.8rem;">
                                    <div class="row">
                                        <span class="mr-3">
                                            <a class="text-dark"
                                               href="{{ route('user.show', [$qna->user->is_producer ? 'producer' : 'singer', $qna->user->id]) }}">
                                                {{ $qna->user->name }}
                                            </a>
                                        </span>
                                        <span class="text-secondary mr-3">
                                            {{ getTime($qna->created_at) }}
                                        </span>
                                        <div class="ml-auto">
                                            @if(isAdmin(Auth::user()))
                                                <form action="{{ route('qna.delete', $qna->id) }}" method="post" style="display: inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-dark btn-sm float-right ml-3" style="font-size: 0.7rem;">삭제</button>
                                                </form>
                                            @endif
                                            @if($qna->answer)
                                                <span
                                                    class="text-success border border-success float-right"
                                                    style="font-size: 0.7rem; padding: 2px;">
                                                    답변 완료
                                                </span>
                                            @else
                                                <span
                                                    class="text-danger border border-danger float-right"
                                                    style="font-size: 0.7rem; padding: 2px;">
                                                    답변 대기중
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </h2>
                        </div>
                        <div id="collapse{{ $qna->id }}" class="collapse show"
                             aria-labelledby="heading{{ $qna->id }}"
                             data-parent="#qna">
                            <div class="card-body">
                                @if($qna->answer)
                                    @if(isAdmin(Auth::user()))
                                        <form action="{{ route('qna.update_answer', $qna->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <textarea class="form-control mb-2" name="answer" id=""
                                                      rows="4">{{ $qna->answer }}</textarea>
                                            <button type="submit" class="btn btn-dark float-right mb-3 ml-2">수정</button>
                                        </form>
                                    @else
                                        <div>
                                            {{ $qna->answer }}
                                        </div>
                                    @endif
                                    <div class="text-right" style="font-size: 0.8rem">
                                        {{ getTime($qna->answered_at) }}에 답변함
                                    </div>
                                @else
                                    @if(isAdmin(Auth::user()))
                                        <form action="{{ route('qna.update_answer', $qna->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <textarea class="form-control mb-2" name="answer" id="" rows="4">
                                            </textarea>
                                            <button type="submit" class="btn btn-dark float-right">제출</button>
                                        </form>
                                    @endif
                                    <div class="text-danger">
                                        답변 대기중입니다.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="row pt-3">
                @if($qnas)
                    <div class="col-8">
                        {{ $qnas->links() }}
                    </div>
                @endif
                <div class="col-4 text-right">
                    <div type="button" class="btn btn-light"
                         data-toggle="modal"
                         data-target="#createModal">질문하기
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog"
         aria-labelledby="createModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">질문하기</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('qna.store') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea class="form-control"
                                      name="question" id="question" rows="10" placeholder="질문 내용"></textarea>
                        </div>
                        <div style="font-size: 0.8rem">* 긴 질문은 하단의 메일로 질문해주세요</div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">제출</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
