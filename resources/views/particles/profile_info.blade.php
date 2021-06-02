<div class="profile_info">
    @if ($user->avatar != null)
        <img class="profile_img" src="{{ asset('/storage/' . $user->avatar) }}" alt="profile_img">
    @else
        <img class="profile_img" src="{{url('imgs/default_photo_profile.jpg')}}" alt="profile_img">
    @endif
    <br>
    <h2 style="margin-left: 50px;"><a href="/profile/delete-page?name={{$user->getUsername()}}">{{ $user->getUsername() }}</a></h2>
    <h2 style="margin-left: 50px;"><a href="{{route('upload.page')}}">Загрузить картинку</a></h2>
</div>
