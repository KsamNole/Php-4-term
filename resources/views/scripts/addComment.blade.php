<script>
    function addComment(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ route('addComment') }}',
            data: {
                'text': document.getElementById(`comment-${id}`).value,
                'id_post': id
            }
        });
        $.ajax({
            url: '{{ route('update-posts', $user->getUsername()) }}',
            success: function (data) {
                $('#display-posts').html(data);
            }
        });
        return false;
    }
</script>
