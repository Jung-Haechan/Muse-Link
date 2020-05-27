<form action="{{route('post.reply.store', $post->id)}}" class="form-horizontal" method='post'>
    @csrf
    <div class="form-group py-3 pb-5">
        <label for="reply">댓글:</label>
        <textarea name='content' id="reply" rows='5' class="form-control" required></textarea>
        <button class="btn btn-dark mt-2" type='submit' style="float:right">댓글</button>
    </div>
    <hr>
</form>
<div class='replies'>
    @foreach($replies as $reply)
        <div>
            <i class="pl-2"><strong>{{$reply->user->name}}</strong> 님의 댓글</i>
            @if(isPostAdmin(Auth::user(), $reply))
                <form action="{{route('post.reply.delete', [$post->id, $reply->id])}}" method="post"
                      style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-dark ml-3">삭제</button>
                </form>
            @endif
            <div class="p-2 mt-2" style="background:#ddd">{{$reply->content}}
                <div class="text-right" style="font-size:13px;">{{$reply->created_at}}</div>
            </div>
        </div>
        <hr>
    @endforeach
</div>
