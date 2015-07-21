<div class="ad ad-email-signup" id="mailchimp-registration">
    <h1>Get Regular News Updates from The Daily Sheeple Now</h1>
    <h2>Sign Up. Stay Informed.</h2>
    <div class="register">
        <input id="mc4wp_email" type="text" name="email-address" placeholder="Type Email" required>
        <p class="privacy">
            <a href="#">Privacy Policy</a>
        </p>
    </div>
    <div class="success hidden">
        <p>Successfully registered!</p>
    </div>
</div>
<script>
(function ($) {
    var url = '<?php echo get_template_directory_uri(); ?>/inc/widgets/mailchimp_process.php';
    var $container = $('#mailchimp-registration');
    var $email = $('#mc4wp_email');
    var $form = $container.find('.register');
    var $success = $container.find('.success').hide();
    $email.on('keypress', function (e) {
        var code = (e.which || e.keyCode);
        if (code === 13) { // ENTER
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    email: $(this).val()
                },
                success: handleSuccess,
                error: handleFailure
            });
        }
    });

    function handleSuccess(data) {
        if (!data.success) {
            handleFailure();
            return;
        }

        $form.fadeOut('fast', function () {
            $success.fadeIn('fast');
        });
    }

    function handleFailure() {}
})(jQuery);
</script>
