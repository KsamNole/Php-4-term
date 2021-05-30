@extends('layout')

@section('main')
    <h2 style="text-align: center">$-----------------> Вход <-----------------$</h2>
    <form method="POST" action="{{ route('auth.signin') }}" novalidate>
        @csrf
        <div class="containers-reg-form">
            <div>
                <label for="username">Username</label>
                <input class="{{ $errors->has('username') ? 'is-invalid' : '' }}" type="text" name="username"
                       id="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password"
                       id="password">
            </div>
            @if ($errors->has('username'))
                <div>
                    <br>
                    <span>{{ $errors->first('username') }}</span>
                </div>
            @endif
            @if ($errors->has('password'))
                <div>
                    <br>
                    <span>{{ $errors->first('password') }}</span>
                </div>
            @endif
            <button class="btn-huge" type="submit">Войти</button>
        </div>
    </form>
    @include('particles.footer')
@endsection
