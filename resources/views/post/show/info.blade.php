<div class='p-3'><strong>
        <a href="{{ route('post.show', $post->id) }}"
           class="text-dark">제목: {{$post['title']}}</a>
    </strong></div>
<div class='row bg-dark text-light p-2 ' style="font-size:12px;">
    <div class='col-4'>By <strong>{{ $post->user->name }}</strong></div>
    <div class='col-4'>{{ getTime($post->created_at) }}</div>
    <div class='col-4'>조회수: {{ $post->views }}</div>
</div>
<div class='p-3' style="min-height: 300px">
    <div class="pb-3" style="white-space:pre-wrap;">{{$post->content}}</div>
</div>


@if(isPostAdmin(Auth::user(), $post))
    <div class="row">
        <form action="{{route('post.delete',$post->id)}}" method='post'>
            <div class="form-group">
                @method('DELETE')
                @csrf
                <button class="btn btn-sm btn-dark ml-4" type='submit'>삭제</button>
            </div>
        </form>
        <form action="{{route('post.edit', $post->id)}}" method='get'>
            <div class="form-group">
                <button class="btn btn-sm btn-dark ml-3" type='submit'>수정</button>
            </div>
        </form>
    </div>
@endif
