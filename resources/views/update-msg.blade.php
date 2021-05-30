@foreach($messages as $message)
    <a style="text-decoration: none; color: #51ff0d;" href="">
        <div class="message">
            <p>{{ $message->created_at }}</p>
            <div class="content-message">
                <img class="img-message" src="{{ url('imgs/default_photo_profile.jpg') }}">
                <div class="text-message">
                    <h3 style="color: gray">{{ $message->from_user }}</h3>
                    <p>{{ $message->text }}</p>
                </div>
            </div>
        </div>
    </a>
    <br>
@endforeach
