<script>
    $(document).ready(function() {
        $('.generateOtp').click(function(){
            $('.phone_no_message').html('');
            $.ajax({
                url: route('generateOtp'),
                type: 'get',
                data: {
                    'phone_no': $('#phone_no').val()
                },
                success: function(response){
                    $('.phone_no_message').html("<div class='text-success'>OTP Sent Successfully</div>");
                    console.log(response);
                },
                error: function(error){
                    $('.phone_no_message').html("<div class='text-danger'>" + error.responseJSON.errors.phone_no[0] + "</div>");
                }
            });
        });
    });
</script>
