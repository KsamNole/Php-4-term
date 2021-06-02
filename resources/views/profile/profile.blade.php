@extends('layout')

@section('main')
    <div class="profile">
        @include('particles.profile_info')
        <div class="posts">
            <div class="add_post">
                <form onsubmit="return addPost();">
                    @csrf
                    <textarea class="text-area-post" name="text" id="text"></textarea>
                    <button type="submit">Отправить</button>
                </form>
            </div>
            <br>
            <div id="display-posts">
                @include('particles.posts')
            </div>
            <script type="text/javascript">
                function addPost() {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('addPost') }}',
                        data: {
                            'text': document.getElementById('text').value
                        }
                    });
                    $.ajax({
                        url: '{{ route('update-posts') }}',
                        success: function (data) {
                            $('#display-posts').html(data);
                        }
                    });
                    document.getElementById('text').value = "";
                    return false;
                }
            </script>
        </div>
    </div>
@endsection
