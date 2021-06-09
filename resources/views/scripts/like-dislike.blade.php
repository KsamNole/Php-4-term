<script>
    function like(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: '{{ route('like') }}',
            data: {
                'id': id
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
    function dislike(id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: '{{ route('dislike') }}',
            data: {
                'id': id
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
