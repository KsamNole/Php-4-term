@extends('layout')

@section('main')
    <div class="profile">
        @include('particles.profile_info')
        <div class="posts">
            <div class="add_post">
                <form action="javascript:addPost()" id="keyDown">
                    @csrf
                    <textarea class="text-area-post" name="text_post" id="text_post"></textarea>
                </form>
            </div>
            <br>
            <div id="display-posts">
                @include('update-posts')
            </div>
        </div>
    </div>
    @include('scripts.addPost')
@endsection

