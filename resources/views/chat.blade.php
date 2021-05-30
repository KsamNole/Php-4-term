@extends('layout')

@section('main')
    <div class="chat">
        <div class="chat-main">
            <div class="chat-profile">
                <img src="{{ url('imgs/default_photo_profile.jpg') }}">
                <h2>{{ $messages[0]->from_user }}</h2>
            </div>
            <div class="chat-messages" id="display-chat">
                @include('update-chat')
            </div>
            <form method="POST" action="{{ route('sendMessage') }}" id="addMessage">
                @csrf
                <textarea class="text-area-message {{ $errors->has('text') ? 'is-invalid' : '' }}" class="text-area-message" name="text" id="text"></textarea>
                <input type="hidden" id="to_user" name="to_user" value="{{ $messages[0]->from_user }}">
            </form>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
            <script type="text/javascript">
                function mode() {
                    $.ajax({
                        url: '{{ route('update-chat', $id) }}',
                        success: function (data) {
                            $('#display-chat').html(data);
                        }
                    });
                }
                setInterval(mode, 1000);
                document.getElementById('display-chat').scrollTop = 9999;
                document.getElementById('addMessage').addEventListener('keydown', function(e){
                    if (e.keyCode == 13) {
                        this.submit();
                    }
                })
            </script>
        </div>
    </div>
@endsection
