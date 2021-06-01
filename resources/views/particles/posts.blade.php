@foreach($posts as $post)
    @if($post->author == $user->getUsername())
        <div class="post">
            <p style="padding: 5px 0 0 5px; color: white;">{{ $post->created_at }}</p>
            <a href="/profile/delete-post?post_id={{$post->id}}"><p style="padding: 0 0 0 5px; font-size: 20px;">{{ $post->text }}</p></a>
            <p style="padding: 0 10px 5px 5px; text-align: right; color: white;"><a
                    style="text-decoration: none; color: white;"
                    href="{{ route('like', $post->id) }}">1: {{ $post->likes }}</a>
                <a style="text-decoration: none; color: white;" href="{{ route('dislike', $post->id) }}">/
                    0: {{ $post->dislikes }}</a></p>
            <hr size="1px;">
            <form method="POST" action="{{ route('addComment') }}" id="addСomment">
                @csrf
                <input class="input-comment" type="text" id="text" name="text">
                <input type="hidden" id="id_post" name="id_post" value="{{ $post->id }}">
            </form>
            <script>
                document.getElementById('addСomment').addEventListener('keydown', function(e){
                    if (e.keyCode == 13) {
                        this.submit();
                    }
                })
            </script>
            @foreach($comments as $comment)
                @if($comment->id_post == $post->id)
                    <div class="comment">
                        <a href="/profile/delete-comment?c_id={{$comment->id}}" ><p style="padding: 5px 0 0 15px; color: white;">{{ $comment->author }}</p></a>
                        <p style="padding: 0 0 0 20px; font-size: 15px;">{{ $comment->text }}</p>
                    </div>
                @endif
            @endforeach
        </div>
        <br>
    @endif
@endforeach
