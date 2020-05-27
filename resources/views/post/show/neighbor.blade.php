<div>
    <div class='row bg-dark p-2 pl-3 text-light' style="border-bottom:1px solid #eee">다음글:
        @if($post_next)
            <a href="{{route('post.show', $post_next->id)}}"
               class="text-light"><strong>{{$post_next->title}}</strong></a>
        @endif
    </div>
    <div class='row bg-dark p-2 pl-3 text-light'>이전글:
        @if($post_previous)
            <a href="{{route('post.show', $post_previous->id)}}"
               class="text-light"><strong>{{$post_previous->title}}</strong></a>
        @endif
    </div>
</div>
