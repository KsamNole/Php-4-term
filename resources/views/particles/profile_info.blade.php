<div class="profile_info">
    <img class="profile_img" src="{{ url('imgs/default_photo_profile.jpg') }}" alt="profile_img">
    <br>
    <h2 style="margin-left: 50px;"><a href="/profile/delete-page?name={{$user->getUsername()}}">{{ $user->getUsername() }}</a></h2>
</div>
