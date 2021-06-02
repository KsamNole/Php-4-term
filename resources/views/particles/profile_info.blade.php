<div class="profile_info">
    @if ($user->avatar != null)
        <img class="profile_img" src="{{ asset('/storage/' . $user->avatar) }}" alt="profile_img">
    @else
        <img class="profile_img" src="{{url('imgs/default_photo_profile.jpg')}}" alt="profile_img">
    @endif
    <br>
    <h2 style="text-align: center;">{{ $user->getUsername() }}</h2>
    @if (Auth::user()->getUsername() == $user->getUsername())
        <h2 style="margin-left: 50px;"><a href="{{route('upload.page')}}">Загрузить картинку</a></h2>
    @endif
    <br>
    @if (Auth::user()->isAdmin() || Auth::user()->getUsername() == $user->getUsername())
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
