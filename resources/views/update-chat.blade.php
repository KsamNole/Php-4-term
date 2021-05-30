@foreach($messages as $message)
    <div class="message">
        <div class="text-message">
            <h3 style="color: gray">{{ $message->from_user }} {{ $message->created_at->format('G:i') }}</h3>
            <p>{{ $message->text }}</p>
        </div>
    </div>
@endforeach
