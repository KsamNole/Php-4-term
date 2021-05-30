@extends('layout')

@section('main')
    <div class="messages" id="display">
        <a style="text-decoration: none; color: #51ff0d;" href="">
            <div class="message">
                <p>2021-05-28 00:27:59</p>
                <div class="content-message">
                    <img class="img-message" src="{{ url('imgs/default_photo_profile.jpg') }}">
                    <div class="text-message">
                        <h3 style="color: gray">qwerty843</h3>
                        <p>Ты ло жи есть отвечаю</p>
                    </div>
                </div>
            </div>
        </a>
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
    </div>
{{--    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>--}}
{{--    <script type="text/javascript">--}}
{{--        function mode() {--}}
{{--            $.ajax({--}}
{{--                url: '{{ route('update-msg') }}',--}}
{{--                success: function (data) {--}}
{{--                    $('#display').html(data);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--        setInterval(mode, 3000);--}}
{{--    </script>--}}
@endsection
