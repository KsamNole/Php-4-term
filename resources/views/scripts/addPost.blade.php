<script>
    function addPost() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ route('addPost') }}',
            data: {
                'text': document.getElementById('text_post').value
            }
        });
        $.ajax({
            url: '{{ route('update-posts', $user->getUsername()) }}',
            success: function (data) {
                $('#display-posts').html(data);
            }
        });
        document.getElementById('text_post').value = "";
        return false;
    }
</script>
