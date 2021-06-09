@extends('layout')

@section('main')
    <div class="profile">
        <div>
            @include('particles.profile_info')
            <br>
            <p style="text-align: center; "><a style="text-decoration: none; color: white;"
                                               href="{{ route('chat', $user->getUsername()) }}">Отправить сообщение</a>
            </p>
        </div>
        <div class="posts">
            <div id="display-posts">
                @include('update-posts')
            </div>
        </div>
    </div>
@endsection
