<script>
    $('.submission-confirm').click(function (e) {
        let request;
        e.preventDefault();
        request = $.post('/admin/submission-update', { id : $(this).data('id'), status : $(this).data('status'), _token: "{{ csrf_token() }}"},
            function(returnedData){
                console.log(returnedData);
            }).fail(function(){
            console.log("error");
        });
        request.done(function (response){
            location.reload();
        });
    })

</script>
