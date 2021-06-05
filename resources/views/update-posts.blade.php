@foreach($posts as $post)
    @if($post->author == $user->getUsername())
        <div class="post">
            <form method="POST" action="{{route('delete.post')}}" id="deletePost-{{$post->id}}">
                @csrf
                <input type="hidden" value="{{$post->id}}" name="post_id">
            </form>
            <div class="time-delete-post">
                <p style="padding: 5px 0 0 5px; color: white;">{{ $post->created_at }}</p>
                @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->getUsername() == $user->getUsername()))
                <p style="text-align: right; padding-right: 10px;">
                    <a class="delete" href="javascript:document.getElementById('deletePost-{{$post->id}}').submit();">
                        <img style="width: 10px; height: 10px;" src="{{ url('imgs/delete.png') }}">
                    </a>
                </p>
                @endif
            </div>
            <p class="post-text">{{ $post->text }}</p>
            <p style="padding: 0 10px 5px 5px; text-align: right; color: white;">
                <a style="text-decoration: none; color: white;" href="javascript:like({{ $post->id }})">1: {{ $post->likes }}</a>
                <a style="text-decoration: none; color: white;" href="javascript:dislike({{ $post->id }})">/ 0: {{ $post->dislikes }}</a>
            </p>
            @include('scripts.like-dislike')
            <hr size="1px;">
            <form action="javascript:addComment({{ $post->id }})" id="keyDown">
                @csrf
                <input class="input-comment" type="text" id="comment-{{ $post->id }}">
            </form>
            @include('scripts.addComment')
            @foreach($comments as $comment)
                @if($comment->id_post == $post->id)
                    <div class="comment">
                        <form method="POST" action="{{route('delete.comment')}}" id="deleteComment-{{$comment->id}}">
                            @csrf
                            <input type="hidden" value="{{$comment->id}}" name="c_id">
                        </form>
                        <div class="time-delete-post">
                            <p style="padding: 5px 0 0 15px; color: white;">{{ $comment->author }}</p>
                            @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->getUsername() == $user->getUsername()))
                            <p style="text-align: right; padding-right: 10px;">
                                <a class="delete" href="javascript:document.getElementById('deleteComment-{{$comment->id}}').submit();">
                                    <img style="width: 10px; height: 10px;" src="{{ url('imgs/delete.png') }}">
                                </a>
                            </p>
                            @endif
                        </div>
                        <p class="comment-text">{{ $comment->text }}</p>
                    </div>
                @endif
            @endforeach
        </div>
        <br>
    @endif
@endforeach
