@extends('layout')

@section('main')
    <div class="chat">
        <div class="chat-main">
            <div class="chat-profile">
                <img src="{{ asset('/storage/' . $to_user->avatar) }}">
                <h2>{{ $to_user->username }}</h2>
            </div>
            <div class="chat-messages" id="display-chat">
                @include('update-chat')
            </div>
            <form action="javascript:sendMessage()" id="keyDown">
                @csrf
                <textarea class="text-area-message" name="text" id="text"></textarea>
                <input type="hidden" id="to_user" value="{{ $to_user->username }}">
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
                    'to_user': '{{ $to_user->username }}'
                }
            });
            document.getElementById('text').value = "";
            setTimeout(scrollDown, 1000);
            return false;
        }
        function mode() {
            $.ajax({
                url: '{{ route('update-chat', $to_user->username) }}',
                success: function (data) {
                    $('#display-chat').html(data);
                }
            });
            document.getElementById('display-chat').scrollTop = 99999
        }
        setInterval(mode, 1000);
    </script>
@endsection
