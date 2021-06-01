<form method="POST" action="{{ route('sendMessage') }}">
    @csrf
    <div class="send-message">
        <textarea class="text-area-message {{ $errors->has('text') ? 'is-invalid' : '' }}" class="text-area-message" name="text" id="text"></textarea>
        <input type="hidden" id="to_user" name="to_user" value="{{ $profile_name }}">
        <button>Отправить</button>
    </div>
</form>
