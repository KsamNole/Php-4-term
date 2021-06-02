@extends('layout')

@section('main')
    <div class="messages" id="display-msg">
        @include('update-msg')
    </div>
    <script type="text/javascript">
        function mode() {
            $.ajax({
                url: '{{ route('update-msg') }}',
                success: function (data) {
                    $('#display-msg').html(data);
                }
            });
        }
        setInterval(mode, 1000);
    </script>
@endsection
