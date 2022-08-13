$('#resend_email').click(function() {
    $('#loading_frame').show();
    $('#resend_email').attr('disabled', true);
    $.ajax({
        url: '/resend-email-employee',
        type: 'POST',
        dataType: "JSON",
        complete: function() {
            $('#loading_frame').hide();
        },
        success: function(output) {
            alert(output['message']);
<<<<<<< HEAD
            if (output['result'] == 'false') {
                window.location.href = '/login';
            }
=======
            $('#resend_email').attr('disabled', true);
>>>>>>> 1b8cd0028ba9a370b0f5c0f6971120c763fe1769
            $('#resend_email').html(`<span>Gửi lại (</span>
							<span class="time">60</span>
							<span>s)</span>`);
            timeout(60);
        }
    });
})


function timeout(s) {
    $('#resend_email .time').html(s);
    if (s === 0) {
        clearTimeout(timeout);
        $('#resend_email').attr('disabled', false);
        $('#resend_email').html('<span>Gửi lại</span>')
        return false;
    }
    setTimeout(function() {
        s--;
        timeout(s);
    }, 1000);
}