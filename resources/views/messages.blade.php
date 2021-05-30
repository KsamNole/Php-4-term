@extends('layout')

@section('main')
    <div class="messages" id="display-msg">
        @include('update-msg')
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        function mode() {
            $.ajax({
                url: '{{ route('update-msg') }}',
                success: function (data) {
                    $('#display-msg').html(data);
                }
            });
        }
        setInterval(mode, 3000);
    </script>
@endsection
