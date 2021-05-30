@extends('layout')

@section('main')
    <div class="background-morph-img">
        <img style="max-width: 100%;" src="/imgs/morpheus.png" alt="">
        <a class="morh-signin" href="{{ route('auth.signin') }}">SignIn</a>
        <a class="morh-signup" href="{{ route('auth.signup') }}">SignUp</a>
    </div>
@endsection

