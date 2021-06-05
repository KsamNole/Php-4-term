@extends('layout')

@section('main')
    <div class="chat">
        <div class="chat-main">
            <div class="chat-profile">
                <img src="{{ url('imgs/default_photo_profile.jpg') }}">
                <h2>{{ $to_user }}</h2>
            </div>
            <div class="chat-messages" id="display-chat">
                @include('update-chat')
            </div>
            <form action="javascript:sendMessage()" id="keyDown">
                @csrf
                <textarea class="text-area-message" name="text" id="text"></textarea>
                <input type="hidden" id="to_user" value="{{ $to_user }}">
            </form>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById('display-chat').scrollTop = 99999
        function sendMessage() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '{{ route('sendMessage') }}',
                data: {
                    'text': document.getElementById('text').value,
                    'to_user': '{{ $to_user }}'
                }
            });
            document.getElementById('text').value = "";
            setTimeout(scrollDown, 1000);
            return false;
        }
        function mode() {
            $.ajax({
                url: '{{ route('update-chat', $to_user) }}',
                success: function (data) {
                    $('#display-chat').html(data);
                }
            });
            document.getElementById('display-chat').scrollTop = 99999
        }
        setInterval(mode, 1000);
    </script>
@endsection
