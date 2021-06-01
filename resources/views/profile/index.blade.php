@extends('layout')

@section('main')
    <div class="profile">
        <div>
            @include('particles.profile_info')
            <br>
            <p style="text-align: center; "><a style="text-decoration: none; color: white;" href="{{ route('chat', $user->getUsername()) }}">Отправить сообщение</a></p>
        </div>
        <div class="posts">
            @include('particles.posts')
        </div>
    </div>
@endsection
