<div class="profile_info">
    <a href="@if(Auth::check() && Auth::user()->getUsername() == $user->getUsername()){{route('upload.page')}}@endif">
        <img class="profile_img" src="@if($user->avatar){{ asset('/storage/' . $user->avatar) }}@else{{url('imgs/default_photo_profile.jpg')}}@endif" alt="profile_img">
    </a>
    <br>
    <h2 style="text-align: center;">{{ $user->getUsername() }}</h2>
    <br>
    @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->getUsername() == $user->getUsername()))
        <form method="POST" action="{{route('delete.page')}}">
            @csrf
            <input type="hidden" value="{{$user->getUsername()}}" name="name">
            <button type="submit">Удалить страницу</button>
        </form>
        <p style="text-align: center;"><a class="delete-profile" id="delete" onclick="_delete()" href="#">Удалить
                страницу</a></p>
    @endif
    <script>
        function _delete() {
            let del = document.getElementById('delete');
            if (del.textContent == 'Уверен?') {
                del.setAttribute('href', '/profile/delete-page?name={{$user->getUsername()}}')
            }
            del.textContent = 'Уверен?';
        }
    </script>
</div>
