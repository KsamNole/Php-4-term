@extends('layout')

@section('main')
    <form action="{{route("image.upload")}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <button type="submit">Загрузить!</button>
    </form>

@endsection
