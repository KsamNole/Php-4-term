@extends('layout')

@section('main')
    <div class="profile">
        @include('particles.profile_info')
        <div class="posts">
            <div class="add_post">
                <form method="POST" action="{{ route('addPost') }}" novalidate>
                    @csrf
                    <div>
                        <textarea class="{{ $errors->has('text') ? 'is-invalid' : '' }} text-area-post" name="text"
                                  id="text"></textarea>
                    </div>
                    <button type="submit">Отправить</button>
                </form>
            </div>
            <br>
            @include('particles.posts')
        </div>
    </div>
@endsection
