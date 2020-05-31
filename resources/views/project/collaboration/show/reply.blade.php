<div class="bg-light pb-2 p-3">
    <form action="{{ route('project.reply.store', $project) }}" method="post">
        @csrf
        <input type="hidden" name="board" value="project">
        <div class="form-group" style="margin-bottom: 0.3rem;">
            <label for="reply" style="display: none"></label>
            <textarea type="text" class="form-control" id="content" name="content"
                      placeholder="댓글을 입력하세요." cols="30" rows="5"></textarea>
        </div>
        <div class="text-right mb-4">
            <button type="submit" class="btn btn-outline-dark btn-sm">등록</button>
        </div>
    </form>

    @forelse($replies as $reply)
        <hr style="margin: 0.1rem;">
        <div class="container">
            <div class="row">
                <div class="ml-auto" style="font-size: 0.7rem;">{{ $reply->created_at }}</div>
            </div>
            <div class="row pb-3">
                <div class="container col-sm-11">
                    <div class="row">
                        <img src="{{ $reply->user->profile_img }}" style="width: 1.5rem"
                             class="my-auto mr-1">
                        <div class="reply font-weight-bold">
                            <a class="text-dark"
                               href="{{ route('user.show', [$reply->user->is_producer ? 'producer' : 'singer', $reply->user->id]) }}">
                                {{ $reply->user->name }}
                            </a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row text-left mt-2">
                            {{ $reply->content }}
                        </div>
                    </div>
                    @if(isProjectReplyAdmin(Auth::user(), $reply))
                        <form action="{{ route('project.reply.delete', [$project->id, $reply->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <div>
                                <button class="btn btn-dark btn-sm float-right">삭제</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <hr style="margin: 0.1rem;">
    @empty
    @endforelse
</div>
