@foreach($info as $item)
    <a style="text-decoration: none; color: #51ff0d;" href="{{ route('chat', $item['message']->from_user) }}">
        <div class="message">
            <p>{{ $item['message']->created_at }}</p>
            <div class="content-message">
                <img class="img-message" src="{{ asset('/storage/' . $item['user']->avatar) }}">
                <div class="text-message">
                    <h3 style="color: gray">{{ $item['message']->from_user }}</h3>
                    <p>{{ $item['message']->text }}</p>
                </div>
            </div>
        </div>
    </a>
@endforeach
