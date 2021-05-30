@extends('layout')

@section('main')
    <div class="profile">
        <div>
            @include('particles.profile_info')
            <br>
            @include('particles.send_message')
        </div>
        <div class="posts">
            @include('particles.posts')
        </div>
    </div>
@endsection
